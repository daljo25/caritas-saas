<?php

namespace App\Filament\Resources\TenantRequestResource\Pages;

use App\Filament\Resources\TenantRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTenantRequest extends EditRecord
{
    protected static string $resource = TenantRequestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
