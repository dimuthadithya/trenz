<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationLabel = 'Categories';
    protected static ?string $modelLabel = 'Category';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('category_name')
                            ->required()
                            ->maxLength(255)
                            ->label('Category Name'),
                        
                        Forms\Components\Select::make('parent_category_id')
                            ->label('Parent Category')
                            ->relationship('parent', 'category_name')
                            ->searchable()
                            ->preload()
                            ->placeholder('Select a parent category')
                            ->createOptionForm([
                                Forms\Components\TextInput::make('category_name')
                                    ->required()
                                    ->maxLength(255)
                                    ->label('Category Name')
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category_name')
                    ->searchable()
                    ->sortable()
                    ->label('Category Name'),
                
                Tables\Columns\TextColumn::make('parent.category_name')
                    ->searchable()
                    ->sortable()
                    ->label('Parent Category'),
                
                Tables\Columns\TextColumn::make('children_count')
                    ->counts('children')
                    ->label('Subcategories')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('parent_category_id')
                    ->label('Parent Category')
                    ->relationship('parent', 'category_name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
