<?php

namespace App\Filament\Tenant\Resources\RecordResource\Pages;

use App\Filament\Tenant\Resources\RecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords as BaseListRecords;

class ListRecords extends BaseListRecords
{
    protected static string $resource = RecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
