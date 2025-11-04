<?php

namespace App\Filament\Widgets;


use App\Models\Pembayaran;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Notifications\Notification;
use Filament\Actions\BulkAction;


class PembayaranPending extends BaseWidget
{
    // Properti ini opsional, tapi bagus untuk mengatur tampilan
    protected static ?int $sort = 1; // Widget ini tampil di urutan #1 (di atas Riwayat)
    protected int | string | array $columnSpan = 'full'; // Lebar penuh

    public function table(Table $table): Table
    {
        return $table
            // 1. UBAH QUERY: Hanya ambil yang statusnya 'pending'
            ->query(
                Pembayaran::query()->where('status', 'pending')->latest()
            )
            // Beri judul pada tabel
            ->heading('Pembayaran Menunggu Verifikasi')

            // 2. ISI KOLOM: Tampilkan data yang relevan
            ->columns([
                Tables\Columns\TextColumn::make('pesanan.id') // Asumsi ada relasi 'pesanan'
                    ->label('ID Pesanan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('tanggal_bayar')->date()->sortable(),
                Tables\Columns\TextColumn::make('jumlah')->money('IDR')->sortable(),
                Tables\Columns\TextColumn::make('metodePembayaran.nama_metode') // Asumsi ada relasi 'metodePembayaran'
                    ->label('Metode'),
                // Anda bisa tambahkan kolom 'bukti_bayar_path' jika ada
            ])
            ->filters([
                // Tidak perlu filter
            ])
            ->headerActions([
                // Tidak perlu aksi di header
            ])
            // 3. ISI RECORD ACTIONS: Tombol untuk setiap baris
            ->recordActions([
                Action::make('Verifikasi')
                    ->action(function (Pembayaran $record) {
                        $record->update(['status' => 'success']); // Ubah status jadi 'success'
                        // Kirim notifikasi sukses
                        Notification::make()
                            ->title('Pembayaran berhasil diverifikasi')
                            ->success()
                            ->send();
                        // Widget akan otomatis refresh
                    })
                    ->color('success')
                    ->icon('heroicon-o-check-circle')
                    ->requiresConfirmation(), // Tampilkan pop-up konfirmasi

                Action::make('Tolak')
                    ->action(function (Pembayaran $record) {
                        $record->update(['status' => 'failed']); // Ubah status jadi 'failed'
                        // Kirim notifikasi ditolak
                        Notification::make()
                            ->title('Pembayaran telah ditolak')
                            ->danger()
                            ->send();
                    })
                    ->color('danger')
                    ->icon('heroicon-o-x-circle')
                    ->requiresConfirmation(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    // Kita tidak perlu bulk action (aksi massal) untuk kasus ini
                ]),
            ]);
    }
}


// class PembayaranPending extends TableWidget
// {
//     public function table(Table $table): Table
//     {
//         return $table
//             ->query(fn (): Builder => Pembayaran::query())
//             ->columns([
//                 //
//             ])
//             ->filters([
//                 //
//             ])
//             ->headerActions([
//                 //
//             ])
//             ->recordActions([
//                 //
//             ])
//             ->toolbarActions([
//                 BulkActionGroup::make([
//                     //
//                 ]),
//             ]);
//     }
// }
