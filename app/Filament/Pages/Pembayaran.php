<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\LatestOrders;

use App\Filament\Widgets\PembayaranStats;
use App\Filament\Widgets\PembayaranPending;
use App\Filament\Widgets\RiwayatPembayaran;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon; // <-- Pastikan 'use' ini ada

class Pembayaran extends Page
{

     protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-home'; // ikon di sidebar

    public function getWidgets(): array
    {
        return [
            PembayaranStats::class,
            PembayaranPending::class,
            RiwayatPembayaran::class,
        ];
    }
    // // Ini adalah properti $view yang sudah benar
    // protected static string $view = 'filament.pages.pembayaran';

    // // INI ADALAH PERBAIKANNYA
    // // (Deklarasi tipe 'Heroicon|string|null' dihapus)
    // protected static $navigationIcon = Heroicon::CurrencyDollar;

    // // Tampilkan 3 kartu statistik di bagian ATAS
    // public function getHeaderWidgets(): array
    // {
    //     return [
    //         PembayaranStats::class,
    //     ];
    // }

    // // Tampilkan 2 tabel di bagian BAWAH
    // public function getFooterWidgets(): array
    // {
    //     return [
    //         PembayaranPending::class,
    //         RiwayatPembayaran::class,
    //     ];
    // }
}
