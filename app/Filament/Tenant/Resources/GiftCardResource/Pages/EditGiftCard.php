<?php

namespace App\Filament\Tenant\Resources\GiftCardResource\Pages;

use App\Filament\Tenant\Resources\GiftCardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGiftCard extends EditRecord
{
    protected static string $resource = GiftCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
