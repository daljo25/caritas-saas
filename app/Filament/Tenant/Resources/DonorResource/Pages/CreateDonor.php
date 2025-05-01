<?php

namespace App\Filament\Tenant\Resources\DonorResource\Pages;

use App\Filament\Tenant\Resources\DonorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDonor extends CreateRecord
{
    protected static string $resource = DonorResource::class;
}
