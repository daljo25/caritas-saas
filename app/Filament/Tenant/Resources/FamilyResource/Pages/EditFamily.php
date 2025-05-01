<?php

namespace App\Filament\Tenant\Resources\FamilyResource\Pages;

use App\Filament\Tenant\Resources\FamilyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFamily extends EditRecord
{
    protected static string $resource = FamilyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
