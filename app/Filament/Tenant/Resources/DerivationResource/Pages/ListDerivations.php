<?php

namespace App\Filament\Tenant\Resources\DerivationResource\Pages;

use App\Filament\Tenant\Resources\DerivationResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListDerivations extends ListRecords
{
    protected static string $resource = DerivationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
