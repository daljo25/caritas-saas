<?php

namespace App\Filament\Tenant\Resources\CollaboratorResource\Pages;

use App\Filament\Tenant\Resources\CollaboratorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCollaborators extends ListRecords
{
    protected static string $resource = CollaboratorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
