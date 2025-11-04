<?php

namespace App\Filament\Resources\TugasDesains\Pages;

use App\Filament\Resources\TugasDesains\TugasDesainResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTugasDesains extends ListRecords
{
    protected static string $resource = TugasDesainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
