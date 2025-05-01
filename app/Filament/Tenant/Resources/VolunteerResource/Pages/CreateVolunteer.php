<?php

namespace App\Filament\Tenant\Resources\VolunteerResource\Pages;

use App\Filament\Tenant\Resources\VolunteerResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVolunteer extends CreateRecord
{
    protected static string $resource = VolunteerResource::class;
}
