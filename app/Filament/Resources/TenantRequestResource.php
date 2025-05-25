<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TenantRequestResource\Pages;
use App\Filament\Resources\TenantRequestResource\RelationManagers;
use App\Models\TenantRequest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\IconColumn;

class TenantRequestResource extends Resource
{
    protected static ?string $model = TenantRequest::class;

    protected static ?string $navigationGroup = 'Solicitudes';
    protected static ?string $navigationIcon = 'tabler-clipboard-list';
    protected static ?string $navigationLabel = 'Solicitudes de parroquias';
    protected static ?int $navigationSort = 2;
    protected static ?string $recordTitleAttribute = 'name';
    protected static ?string $slug = 'tenant-requests';
    protected static ?string $pluralModelLabel = 'Solicitudes de parroquias';
    protected static ?string $modelLabel = 'Solicitud de parroquia';

    public static function getNavigationBadge(): ?string {
        return static::$model::where('status', 'pending')->count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->label('Nombre completo'),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('phone')
                    ->tel()
                    ->required()
                    ->label('Teléfono'),
                TextInput::make('parish_name')
                    ->required()
                    ->label('Nombre de la parroquia'),
                TextInput::make('parish_address')
                    ->label('Dirección'),
                TextInput::make('parish_city')
                    ->label('Ciudad'),
                TextInput::make('parish_website')
                    ->label('Sitio web'),
                TextInput::make('parish_diocese')
                    ->label('Diócesis'),
                Select::make('plan')
                    ->options([
                        'Basico' => 'Básico',
                        'Estandar' => 'Estandar',
                        'Diocesano' => 'Diocesano',
                    ])
                    ->required()
                    ->label('Plan deseado'),
                Select::make('status')
                    ->options([
                        'pending' => 'Pendiente',
                        'approved' => 'Aprobado',
                        'rejected' => 'Rechazado',
                    ])
                    ->default('pending')
                    ->label('Estado'),
                Textarea::make('mensaje')->label('Mensaje adicional')
                    ->rows(3)
                    ->columnSpanFull()
                    ->placeholder('Escribe aquí cualquier mensaje adicional que desees enviar'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->label('Nombre')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')->label('Email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('phone')->label('Teléfono')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('parish_name')->label('Parroquia')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('plan')->label('Plan')
                    ->badge()
                    ->sortable()
                    ->color(fn(string $state): string => match ($state) {
                        'Basico' => 'gray',
                        'Estandar' => 'warning',
                        'Diocesano' => 'success',
                    }),
                IconColumn::make('status')
                    ->icon(fn(string $state): string => match ($state) {
                        'pending' => 'tabler-exclamation-circle',
                        'approved' => 'tabler-circle-check',
                        'rejected' => 'tabler-circle-x',
                    })
                    ->color(fn(string $state): string => match ($state) {
                        'pending' => 'warning',
                        'approved' => 'success',
                        'rejected' => 'danger',
                    })
                    ->sortable()
                    ->label('Estado'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->since()
                    ->label('Fecha de solicitud'),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTenantRequests::route('/'),
            'create' => Pages\CreateTenantRequest::route('/create'),
            'edit' => Pages\EditTenantRequest::route('/{record}/edit'),
        ];
    }
}
