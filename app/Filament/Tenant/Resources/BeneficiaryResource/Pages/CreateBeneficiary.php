<?php

namespace App\Filament\Tenant\Resources\BeneficiaryResource\Pages;

use App\Filament\Tenant\Resources\BeneficiaryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBeneficiary extends CreateRecord
{
    protected static string $resource = BeneficiaryResource::class;
}
