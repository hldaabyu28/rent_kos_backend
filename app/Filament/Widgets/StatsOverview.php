<?php

namespace App\Filament\Widgets;

use Carbon\Carbon;
use App\Models\Listing;
use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $newListing = Listing::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        $transaction = Transaction::whereStatus('approved', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->count();
        return [
            Stat::make('New Listing of the month', $newListing),
            Stat::make('Transaction of the month', $transaction),

        ];
    }
}
