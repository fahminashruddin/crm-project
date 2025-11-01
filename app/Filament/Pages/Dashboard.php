<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\LatestOrders;

class Dashboard extends BaseDashboard
{
    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-home'; // ikon di sidebar

    public function getWidgets(): array
    {
        return [
            StatsOverview::class, // tampil di atas
            LatestOrders::class,  // tampil di bawah
        ];
    }
}
