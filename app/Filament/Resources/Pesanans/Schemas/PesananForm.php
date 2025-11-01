<?php

namespace App\Filament\Resources\Pesanans\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PesananForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                DatePicker::make('tanggal_pesanan')
                    ->required(),
                Textarea::make('catatan')
                    ->columnSpanFull(),
                TextInput::make('pelanggan_id')
                    ->required()
                    ->numeric(),
                TextInput::make('pengguna_id')
                    ->required()
                    ->numeric(),
                TextInput::make('status_pesanan_id')
                    ->required()
                    ->numeric(),
            ]);
    }
}
