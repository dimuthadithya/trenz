<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationLabel = 'Products';
    protected static ?string $modelLabel = 'Product';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('Rs'),
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('products')
                            ->preserveFilenames()
                            ->visibility('public')
                            ->imageEditor()
                            ->circleCropper()
                            ->required(fn(string $operation): bool => $operation === 'create')
                            ->dehydrateStateUsing(function ($state) {
                                if (empty($state)) return null;
                                if (is_array($state)) {
                                    $first = reset($state);
                                    return $first;
                                }
                                return str_replace('storage/', '', $state);
                            }),

                        Forms\Components\FileUpload::make('gallery')
                            ->multiple()
                            ->image()
                            ->directory('products/gallery')
                            ->preserveFilenames()
                            ->visibility('public')
                            ->reorderable()
                            ->appendFiles()
                            ->imageEditor()
                            ->maxFiles(5)
                            ->default(function ($record) {
                                if (!$record) return [];
                                return $record->galleryImages()
                                    ->where('image_type', 'gallery')
                                    ->pluck('image_path')
                                    ->map(fn($path) => str_replace('storage/', '', $path))
                                    ->toArray();
                            })
                            ->dehydrateStateUsing(fn($state) => null)
                            ->afterStateUpdated(function ($state, Forms\Set $set, $get) {
                                if ($state && is_array($state)) {
                                    $record = Product::find($get('id'));
                                    if ($record) {
                                        // Get all the new image paths
                                        $newPaths = array_map(function ($image) {
                                            return 'products/gallery/' . basename($image);
                                        }, $state);

                                        // Delete removed images
                                        $record->galleryImages()
                                            ->where('image_type', 'gallery')
                                            ->whereNotIn('image_path', $newPaths)
                                            ->delete();

                                        // Add or update gallery images
                                        foreach ($state as $image) {
                                            $path = 'products/gallery/' . basename($image);
                                            $record->galleryImages()->updateOrCreate(
                                                [
                                                    'product_id' => $record->id,
                                                    'image_type' => 'gallery',
                                                    'image_path' => $path,
                                                ],
                                                [
                                                    'image_name' => basename($image)
                                                ]
                                            );
                                        }
                                    }
                                }
                            }),

                        Forms\Components\RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Select::make('category_id')
                            ->relationship('category', 'category_name')
                            ->required()
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->circular()
                    ->size(50),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('lkr')
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.category_name')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->relationship('category', 'category_name')
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
