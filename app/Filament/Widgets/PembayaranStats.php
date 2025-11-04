<?php

namespace App\Filament\Widgets;

use App\Models\Pembayaran;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class PembayaranStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        {
        // 1. Hitung yang menunggu verifikasi
        $menunggu = Pembayaran::where('status', 'pending')->count();

        // 2. Hitung yang sudah terverifikasi (sukses)
        $terverifikasi = Pembayaran::where('status', 'success')->count();

        // 3. Hitung total pendapatan dari yang sukses
        $totalPendapatan = Pembayaran::where('status', 'success')->sum('jumlah');

        return [
            Stat::make('Menunggu Verifikasi', $menunggu)
                ->description('Pembayaran perlu dicek')
                ->color('warning'),

            Stat::make('Terverifikasi', $terverifikasi)
                ->description('Pembayaran sukses')
                ->color('success'),

            Stat::make('Total Pendapatan', Number::currency($totalPendapatan, 'IDR'))
                ->description('Dari semua pembayaran sukses')
                ->color('success'),
        ];
    }
    }
}
