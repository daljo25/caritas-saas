<?php

namespace App\Filament\Tenant\Resources;

use App\Filament\Tenant\Resources\FamilyResource\Pages;
use App\Filament\Tenant\Resources\FamilyResource\RelationManagers;
use App\Models\Family;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FamilyResource extends Resource
{
    protected static ?string $model = Family::class;
    protected static ?string $navigationGroup = 'Usuarios';
    protected static ?string $label = 'Familiares';
    protected static ?string $navigationIcon = 'tabler-users-group';
    protected static ?string $recordTitleAttribute = 'Familiares';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Tabs::make('Tabs')
                ->tabs([
                    Tabs\Tab::make('Datos del Familiar')
                        ->icon('tabler-user')
                        ->schema([
                            Fieldset::make('Usuario Titular')
                                ->schema([
                                    // titular
                                    Forms\Components\Select::make('beneficiary_id')
                                        ->label('Usuario Titular')
                                        ->relationship('beneficiary', 'name')
                                        ->searchable()
                                        ->preload()
                                        ->required(),
                                ]),
                            Fieldset::make('Datos Personales')
                                ->schema([
                                    // datos del familiar
                                    Forms\Components\TextInput::make('name')
                                        ->label('Nombres y Apellidos')
                                        ->required()
                                        ->maxLength(255),
                                    Forms\Components\TextInput::make('dni')
                                        ->label('DNI / NIE / PAS')
                                        ->maxLength(255),
                                    Forms\Components\DatePicker::make('expiration_date')
                                        ->label('Fecha de Vencimiento'),
                                    Forms\Components\Select::make('nationality')
                                        ->label('Nacionalidad')
                                        ->options(config('countries'))
                                        ->preload()
                                        ->searchable(),
                                    Forms\Components\DatePicker::make('birth_date')
                                        ->label('Fecha de Nacimiento'),
                                    Forms\Components\Select::make('relationship')
                                        ->label('Parentesco')
                                        ->options([
                                            'Esposo/a' => 'Esposo/a',
                                            'Hijo' => 'Hijo',
                                            'Hija' => 'Hija',
                                            'Madre' => 'Madre',
                                            'Padre' => 'Padre',
                                            'Hermano/a' => 'Hermano/a',
                                            'Primo/a' => 'Primo/a',
                                            'Tio/a' => 'Tio/a',
                                            'Sobrino/a' => 'Sobrino/a',
                                            'Otro' => 'Otro',
                                        ]),
                                    Forms\Components\TextInput::make('phone')
                                        ->label('Teléfono')
                                        ->tel()
                                        ->maxLength(255),
                                    Forms\Components\TextInput::make('email')
                                        ->label('Correo Electrónico')
                                        ->email()
                                        ->maxLength(255),
                                    Forms\Components\TextInput::make('education')
                                        ->label('Nivel de Educación')
                                        ->maxLength(255),
                                ])
                        ])
                        ->columns(2),
                    Tabs\Tab::make('Documentos')
                        ->icon('tabler-file-type-doc')
                        ->schema([
                            Fieldset::make('Informe de Vida Laboral')
                                ->schema([
                                    //documentos ivl
                                    Forms\Components\DatePicker::make('ivl_emission_date')
                                        ->label('Fecha de Emisión'),
                                    Forms\Components\DatePicker::make('ivl_alta_date')
                                        ->label('Fecha de Alta'),
                                    Forms\Components\DatePicker::make('ivl_baja_date')
                                        ->label('Fecha de Baja'),
                                ])
                                ->columns(3),
                            Fieldset::make('Certificado de Pensionista')
                                ->schema([
                                    //documentos cdp
                                    Forms\Components\DatePicker::make('cdp_emission_date')
                                        ->label('Fecha de Emisión'),
                                    Forms\Components\Toggle::make('cdp_state')
                                        ->label('Negativo o Positivo')
                                        ->onColor('success')
                                        ->offColor('danger')
                                        ->inline(false)
                                        ->live(),
                                    Forms\Components\TextInput::make('cdp_amount')
                                        ->label('Monto')
                                        ->numeric()
                                        ->inputMode('decimal')
                                        ->prefixIcon('heroicon-o-currency-euro')
                                        ->visible(fn (Get $get): bool => $get('cdp_state')),
                                ])
                                ->columns(3),
                            Fieldset::make('SEPE')
                                ->schema([
                                    //documentos sepe
                                    Forms\Components\DatePicker::make('sepe_emission_date')
                                        ->label('Fecha de Emisión'),
                                    Forms\Components\Toggle::make('sepe_state')
                                        ->label('Negativo o Positivo')
                                        ->onColor('success')
                                        ->offColor('danger')
                                        ->inline(false)
                                        ,
                                    Forms\Components\TextInput::make('sepe_amount')
                                        ->label('Monto')
                                        ->numeric()
                                        ->inputMode('decimal')
                                        ->prefixIcon('heroicon-o-currency-euro')
                                        ->visible(fn (Get $get): bool => $get('sepe_state')),
                                ])
                                ->columns(3),
                            Fieldset::make('Renta Minima Vital')
                                ->schema([
                                    //documentos rmv
                                    Forms\Components\DatePicker::make('rmv_emission_date')
                                        ->label('Fecha de Emisión'),
                                    Forms\Components\Toggle::make('rmv_state')
                                        ->label('Negativo o Positivo')
                                        ->onColor('success')
                                        ->offColor('danger')
                                        ->inline(false)
                                        ->live(),
                                    Forms\Components\TextInput::make('rmv_amount')
                                        ->label('Monto')
                                        ->numeric()
                                        ->inputMode('decimal')
                                        ->prefixIcon('heroicon-o-currency-euro')
                                        ->visible(fn (Get $get): bool => $get('rmv_state')),
                                ])
                                ->columns(3),
                            Fieldset::make('REMISA')
                                ->schema([
                                    //documentos remisa
                                    Forms\Components\DatePicker::make('remisa_emission_date')
                                        ->label('Fecha de Emisión'),
                                    Forms\Components\Toggle::make('remisa_state')
                                        ->label('Negativo o Positivo')
                                        ->onColor('success')
                                        ->offColor('danger')
                                        ->inline(false)
                                        ->live(),
                                    Forms\Components\TextInput::make('remisa_amount')
                                        ->label('Monto')
                                        ->numeric()
                                        ->inputMode('decimal')
                                        ->prefixIcon('heroicon-o-currency-euro')
                                        ->visible(fn (Get $get): bool => $get('remisa_state')),
                                ])
                                ->columns(3),
                        ])
                        ->columns(2),
                ])
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('beneficiary.name')
                ->label('Usuario Titular')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('name')
                ->label('Nombres y Apellidos')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('dni')
                ->label('DNI / NIE / PAS')
                ->searchable(),
            Tables\Columns\TextColumn::make('birth_date')
                ->label('Fecha de Nacimiento')
                ->date()
                ->sortable(),
                Tables\Columns\TextColumn::make('age')
                ->label('Edad')
                ->sortable()
                ->state(function (Family $record): ?string{
                    return Carbon::parse($record->birth_date)->age;
                })
                ->toggleable(isToggledHiddenByDefault: false),
            Tables\Columns\TextColumn::make('relationship')
                ->label('Parentesco')
                ->searchable(),
            Tables\Columns\TextColumn::make('phone')
                ->label('Teléfono')
                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->label('Correo Electrónico')
                ->searchable(),
            Tables\Columns\TextColumn::make('education')
                ->label('Nivel de Educación')
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ])
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
            'index' => Pages\ListFamilies::route('/'),
            'create' => Pages\CreateFamily::route('/create'),
            'edit' => Pages\EditFamily::route('/{record}/edit'),
        ];
    }
}
