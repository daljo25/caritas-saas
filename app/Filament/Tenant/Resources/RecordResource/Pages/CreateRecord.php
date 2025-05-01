<?php

namespace App\Filament\Tenant\Resources\RecordResource\Pages;

use App\Filament\Tenant\Resources\RecordResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord as BaseCreateRecord;

class CreateRecord extends BaseCreateRecord
{
    protected static string $resource = RecordResource::class;
}
