<?php

namespace App\Filament\Tenant\Resources\MonthlyReportResource\Pages;

use App\Filament\Tenant\Resources\MonthlyReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMonthlyReports extends ListRecords
{
    protected static string $resource = MonthlyReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
