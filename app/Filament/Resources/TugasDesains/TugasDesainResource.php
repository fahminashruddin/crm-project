<?php

namespace App\Filament\Resources\TugasDesains;

use App\Filament\Resources\TugasDesains\Pages\CreateTugasDesain;
use App\Filament\Resources\TugasDesains\Pages\EditTugasDesain;
use App\Filament\Resources\TugasDesains\Pages\ListTugasDesains;
use App\Filament\Resources\TugasDesains\Schemas\TugasDesainForm;
use App\Filament\Resources\TugasDesains\Tables\TugasDesainsTable;
use App\Models\TugasDesain;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TugasDesainResource extends Resource
{
    protected static ?string $model = TugasDesain::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Desain';

    public static function form(Schema $schema): Schema
    {
        return TugasDesainForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TugasDesainsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTugasDesains::route('/'),
            'create' => CreateTugasDesain::route('/create'),
            'edit' => EditTugasDesain::route('/{record}/edit'),
        ];
    }
}
