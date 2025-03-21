<?php

namespace App\Filament\Taller\Resources\OrdenTrabajoResource\Pages;

use App\Filament\Taller\Resources\OrdenTrabajoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrdenTrabajos extends ListRecords
{
    protected static string $resource = OrdenTrabajoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
