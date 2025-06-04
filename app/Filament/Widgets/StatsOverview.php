<?php

namespace App\Filament\Widgets;

use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use App\Models\Payment;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    
    protected function getStats(): array
    {
        // Get stats for last 7 days
        $lastWeek = Carbon::now()->subDays(7);
        
        $totalRevenue = Payment::where('status', 'completed')->sum('amount');
        $weeklyRevenue = Payment::where('status', 'completed')
            ->where('created_at', '>=', $lastWeek)
            ->sum('amount');

        $totalOrders = Order::count();
        $weeklyOrders = Order::where('created_at', '>=', $lastWeek)->count();
        
        $totalCustomers = User::where('role', 'customer')->count();
        $newCustomers = User::where('role', 'customer')
            ->where('created_at', '>=', $lastWeek)
            ->count();

        $totalProducts = Product::count();
        $lowStock = Product::where('stock', '<', 10)->count();

        return [
            Stat::make('Total Revenue', 'LKR ' . number_format($totalRevenue, 2))
                ->description('LKR ' . number_format($weeklyRevenue, 2) . ' this week')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->chart([7, 4, 6, 5, 8, 3, 9]),

            Stat::make('Total Orders', $totalOrders)
                ->description($weeklyOrders . ' new orders this week')
                ->descriptionIcon('heroicon-m-shopping-cart')
                ->color('info')
                ->chart([3, 5, 7, 6, 4, 5, 8]),

            Stat::make('Total Customers', $totalCustomers)
                ->description($newCustomers . ' new customers this week')
                ->descriptionIcon('heroicon-m-users')
                ->color('warning')
                ->chart([4, 6, 5, 3, 5, 7, 6]),

            Stat::make('Products', $totalProducts)
                ->description($lowStock . ' products low in stock')
                ->descriptionIcon('heroicon-m-shopping-bag')
                ->color($lowStock > 0 ? 'danger' : 'success')
                ->chart([5, 4, 6, 8, 4, 3, 5]),
        ];
    }
}
