<?php

namespace App\Filament\Widgets;

use App\Models\Pesanan;
use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestOrders extends BaseWidget
{
    protected static ?string $heading = 'Pesanan Terbaru';
    protected int|string|array $columnSpan = 'full'; // agar tabel lebar penuh

    protected function getTableQuery(): Builder
    {
        return Pesanan::query()
            ->latest() // urut dari terbaru
            ->take(5); // ambil 5 pesanan terbaru
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')
                ->label('ID')
                ->sortable(),

            Tables\Columns\TextColumn::make('tanggal_pesanan')
                ->label('Tanggal Pesanan')
                ->date(),

            Tables\Columns\TextColumn::make('pelanggan.nama')
                ->label('Pelanggan'),

            Tables\Columns\TextColumn::make('status_pesanan.nama_status')
                ->label('Status'),

            Tables\Columns\TextColumn::make('catatan')
                ->label('Catatan')
                ->limit(30),
        ];
    }
}
