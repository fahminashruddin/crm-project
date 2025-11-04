<?php

namespace App\Filament\Resources\TugasDesains\Pages;

use App\Filament\Resources\TugasDesains\TugasDesainResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTugasDesain extends EditRecord
{
    protected static string $resource = TugasDesainResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
