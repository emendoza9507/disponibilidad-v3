<?php

namespace App\Filament\Taller\Resources\AutoResource\Pages;

use App\Filament\Taller\Resources\AutoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAuto extends EditRecord
{
    protected static string $resource = AutoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
