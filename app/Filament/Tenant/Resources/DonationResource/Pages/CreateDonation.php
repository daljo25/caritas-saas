<?php

namespace App\Filament\Tenant\Resources\DonationResource\Pages;

use App\Filament\Tenant\Resources\DonationResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateDonation extends CreateRecord
{
    protected static string $resource = DonationResource::class;
}
