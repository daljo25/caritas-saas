<?php

namespace App\Filament\Tenant\Resources\VolunteerResource\Pages;

use App\Filament\Tenant\Resources\VolunteerResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditVolunteer extends EditRecord
{
    protected static string $resource = VolunteerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
