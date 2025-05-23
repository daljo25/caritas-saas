<?php

namespace App\Filament\Tenant\Resources\AppointmentResource\Pages;

use App\Filament\Tenant\Resources\AppointmentResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAppointment extends CreateRecord
{
    protected static string $resource = AppointmentResource::class;
}
