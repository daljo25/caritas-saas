<?php

namespace App\Filament\Tenant\Resources\BeneficiaryResource\Pages;

use App\Filament\Tenant\Resources\BeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBeneficiary extends EditRecord
{
    protected static string $resource = BeneficiaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
