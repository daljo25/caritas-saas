<?php

namespace App\Filament\Tenant\Resources\AidResource\Pages;

use App\Filament\Tenant\Resources\AidResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Blade;

class EditAid extends EditRecord
{
    protected static string $resource = AidResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Action::make('pdf')
                ->label('Recibi')
                ->color('success')
                ->icon('tabler-printer')
                ->action(function (Model $record) {
                    return response()->streamDownload(function () use ($record) {
                        echo FacadePdf::loadHtml(
                            Blade::render('pdf.receipt', ['record' => $record])
                        )->stream();
                    }, 'Ayuda de ' . $record->type . ' a ' . $record->Beneficiary->name . '.pdf');
                }),
            Actions\DeleteAction::make(),
        ];
    }
}
