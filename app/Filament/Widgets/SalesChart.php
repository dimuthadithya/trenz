<?php

namespace App\Filament\Widgets;

use App\Models\Payment;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Carbon;

class SalesChart extends ChartWidget
{
    protected static ?string $heading = 'Sales Overview';

    protected static ?int $sort = 2;

    protected function getData(): array
    {
        $data = [];
        $labels = [];

        // Get sales data for last 30 days
        for ($i = 30; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $labels[] = $date->format('M d');

            $sales = Payment::where('status', 'completed')
                ->whereDate('created_at', $date)
                ->sum('amount');

            $data[] = $sales;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Daily Sales (LKR)',
                    'data' => $data,
                    'fill' => true,
                    'borderColor' => '#10B981',
                    'backgroundColor' => 'rgba(16, 185, 129, 0.1)',
                    'tension' => 0.3,
                ]
            ],
            'labels' => $labels
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'callback' => "function(value) {
                            return 'LKR ' + value.toLocaleString()
                        }"
                    ],
                ],
            ],
            'plugins' => [
                'legend' => [
                    'display' => false,
                ],
                'tooltip' => [
                    'callbacks' => [
                        'label' => "function(context) {
                            return 'LKR ' + context.parsed.y.toLocaleString()
                        }"
                    ]
                ]
            ],
        ];
    }
}
