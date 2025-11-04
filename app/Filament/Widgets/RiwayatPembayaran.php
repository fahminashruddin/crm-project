<?php

namespace App\Filament\Widgets;

use App\Models\Pembayaran;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RiwayatPembayaran extends BaseWidget
{
    protected static ?int $sort = 2; // Urutan widget (tabel ini di bawah)
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Riwayat Pembayaran')

            // Ambil data yang sudah 'success' atau 'failed'
            ->query(
                Pembayaran::query()->whereIn('status', ['success', 'failed'])->latest()
            )
            ->columns([
                Tables\Columns\TextColumn::make('pesanan.id')
                    ->label('ID Pesanan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('jumlah')->money('IDR')->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->badge() // Tampilkan sebagai 'badge'
                    ->color(fn (string $state): string => match ($state) {
                        'success' => 'success',
                        'failed' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Tgl. Diverifikasi/Ditolak')
                    ->dateTime()
                    ->sortable(),
            ]);
    }
}
