<?php

namespace App\Filament\Tenant\Resources\AidResource\Pages;

use App\Filament\Tenant\Resources\AidResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAids extends ListRecords
{
    protected static string $resource = AidResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
