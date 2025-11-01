<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Pesanan;
use App\Models\Pelanggan;
use App\Models\Pembayaran;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Models\StatusPesanan;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        // Jumlah total pesanan
        $totalPesanan = Pesanan::count();

        // Ambil id status "selesai" (jika ada di tabel status_pesanans)
        $statusSelesai = StatusPesanan::where('nama_status', 'selesai')->first();

        // pembayran pending
        $pembayaranPending = StatusPesanan::where('nama_status', 'pending')->count();

        // Hitung pesanan dengan status selesai
        $pesananSelesai = $statusSelesai
            ? Pesanan::where('status_pesanan_id', $statusSelesai->id)->count()
            : 0;

        // Hitung total pendapatan dari pembayaran sukses
        $totalPendapatan = Pembayaran::where('status', 'sukses')->sum('nominal');

        return [
            Stat::make('Total Pesanan', $totalPesanan)
                ->description('Semua pesanan yang telah dibuat')
                ->color('primary'),

            Stat::make('Pesanan Selesai', $pembayaranPending)
                ->description('Pesanan yang sudah selesai diproses')
                ->color('success'),

           Stat::make('Pembayaran Pending', $pembayaranPending)
                ->description('Jumlah pembayaran yang belum dikonfirmasi')
                ->color('warning')
                ->icon('heroicon-o-clock'),

            Stat::make('Total Pendapatan', 'Rp ' . number_format($totalPendapatan, 0, ',', '.'))
                ->description('Total pendapatan dari pembayaran sukses')
                ->color('success')
                ->icon('heroicon-o-banknotes'),
        ];
    }
     protected int|array|null $columns = 2;

}
