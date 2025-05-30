<?php

namespace App\Filament\Tenant\Resources;

use App\Filament\Tenant\Resources\AppointmentResource\Pages;
use App\Filament\Tenant\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Fieldset;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;


class AppointmentResource extends Resource
{
protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'tabler-calendar';
    protected static ?string $navigationGroup = 'Citas';
    protected static ?string $label = 'Cita';
    protected static ?string $pluralLabel = 'Citas';
    protected static ?string $navigationLabel = 'Citas';
    protected static ?string $recordTitleAttribute = 'Cita';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Usuario')
                    ->schema([
                        Forms\Components\Select::make('beneficiary_id')
                            ->relationship('beneficiary', 'name')
                            ->label('Nombre')
                            ->searchable(['name', 'id', 'expedient', 'dni', 'phone'])
                            ->preload()
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state) {
                                    $beneficiary = \App\Models\Beneficiary::find($state);
                                    if ($beneficiary) {
                                        $set('phone_number', $beneficiary->phone);
                                        $set('email', $beneficiary->email);
                                        $set('address', $beneficiary->address);
                                    }
                                } else {
                                    $set('phone_number', '');
                                    $set('email', '');
                                    $set('address', '');
                                }
                            })
                            ->createOptionForm([
                                Forms\Components\TextInput::make('dni')
                                    ->label('DNI/NIE/PAS')
                                    ->required()
                                    ->unique()
                                    ->validationMessages([
                                        'unique' => 'El :Attribute ya esta registrado.',
                                    ])
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('name')
                                    ->label('Nombre')
                                    ->required()
                                    ->unique()
                                    ->validationMessages([
                                        'unique' => 'El :Attribute ya esta registrado.',
                                    ])
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('phone')
                                    ->label('Teléfono')
                                    ->tel()
                                    ->required()
                                    ->unique()
                                    ->validationMessages([
                                        'unique' => 'El :Attribute ya esta registrado.',
                                    ])
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('address')
                                    ->label('Dirección')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Select::make('volunteer_id')
                                    ->required()
                                    ->relationship('Volunteer', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->label('Voluntario'),
                                Forms\Components\TextInput::make('email')
                                    ->label('Email')
                                    ->email()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('state')
                                    ->label('Estado')
                                    ->required()
                                    ->default('Archivado')
                                    ->readOnly(),
                            ]),
                        Forms\Components\TextInput::make('phone_number')
                            ->label('Teléfono')
                            ->tel()
                            ->readOnly()
                            ->maxLength(255)
                            ->dehydrated(false)
                            ->afterStateHydrated(function (callable $set, $state, $record) {
                                if ($record) {
                                    $beneficiary = $record->beneficiary;
                                    if ($beneficiary) {
                                        $set('phone_number', $beneficiary->phone);
                                    }
                                }
                            }),
                        Forms\Components\TextInput::make('email')
                            ->label('Email')
                            ->email()
                            ->readOnly()
                            ->maxLength(255)
                            ->dehydrated(false)
                            ->afterStateHydrated(function (callable $set, $state, $record) {
                                if ($record) {
                                    $beneficiary = $record->beneficiary;
                                    if ($beneficiary) {
                                        $set('email', $beneficiary->email);
                                    }
                                }
                            }),
                        Forms\Components\TextInput::make('address')
                            ->label('Dirección')
                            ->readOnly()
                            ->maxLength(255)
                            ->dehydrated(false)
                            ->afterStateHydrated(function (callable $set, $state, $record) {
                                if ($record) {
                                    $beneficiary = $record->beneficiary;
                                    if ($beneficiary) {
                                        $set('address', $beneficiary->address);
                                    }
                                }
                            }),
                    ])
                    ->columns(2),
                Fieldset::make('Cita')
                    ->schema([
                        Forms\Components\DatePicker::make('appointment_date')
                            ->label('Fecha de la Cita')
                            ->hiddenOn('create'),
                        Forms\Components\TimePicker::make('appointment_time')
                            ->label('Hora de la Cita')
                            ->hiddenOn('create')
                            ->seconds(false)
                            ->datalist([
                                '10:00' => '10:00',
                                '10:30' => '10:30',
                                '11:00' => '11:00',
                                '11:30' => '11:30',
                                '12:00' => '12:00',
                                '12:30' => '12:30',
                                '13:00' => '13:00',
                                '13:30' => '13:30',
                            ]),
                        Forms\Components\TextInput::make('notes')
                            ->label('Notas')
                            ->maxLength(255),
                        Forms\Components\Select::make('status')
                            ->label('Estado')
                            ->options([
                                'Pendiente' => 'Pendiente',
                                'Aceptada' => 'Aceptada',
                                'Cancelada' => 'Cancelada',
                                'No Contesta' => 'No Contesta',
                                'Documentos Incompletos' => 'Documentos Incompletos',
                                'Rechazada' => 'Rechazada',
                                'Atendida' => 'Atendida',
                            ])
                            ->default('Pendiente'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
             ->columns([
                Tables\Columns\TextColumn::make('beneficiary.name')
                    ->searchable()
                    ->label('Usuario')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('appointment_date')
                    ->label('Fecha de la Cita')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('appointment_time')
                    ->sortable()
                    ->label('Hora de la Cita'),
                Tables\Columns\TextColumn::make('notes')
                    ->searchable()
                    ->label('Notas'),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->label('Estado'),
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
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
