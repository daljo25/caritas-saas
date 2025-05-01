<?php

namespace App\Filament\Tenant\Resources\CollaboratorResource\Pages;

use App\Filament\Tenant\Resources\CollaboratorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCollaborator extends CreateRecord
{
    protected static string $resource = CollaboratorResource::class;
}
