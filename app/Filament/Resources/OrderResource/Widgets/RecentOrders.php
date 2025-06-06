<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class RecentOrders extends ChartWidget
{
    protected static ?string $heading = 'Recent Orders';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $orders = Order::query()
            ->selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Orders',
                    'data' => $orders->pluck('count')->toArray(),
                    'backgroundColor' => '#10B981',
                    'borderColor' => '#10B981',
                ],
            ],
            'labels' => $orders->pluck('date')->map(function ($date) {
                return Carbon::parse($date)->format('M d');
            })->toArray(),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
