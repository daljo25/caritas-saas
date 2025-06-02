<?php

namespace App\Filament\Tenant\Resources;

use App\Filament\Tenant\Resources\GiftCardResource\Pages;
use App\Filament\Tenant\Resources\GiftCardResource\RelationManagers;
use App\Models\GiftCard;
use App\Models\Aid;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GiftCardResource extends Resource
{
    protected static ?string $model = GiftCard::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('serie')
                    ->label('Serie')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('number')
                    ->label('Número')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('pin')
                    ->label('PIN')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('amount')
                    ->label('Monto')
                    ->prefixIcon('heroicon-o-currency-euro')
                    ->required()
                    ->numeric()
                    ->inputMode('decimal'),
                Forms\Components\Select::make('aid_id')
                ->label('Ayuda')
                ->searchable()
                ->options(function () {
                    return Aid::query()
                        ->with('beneficiary') // Cargar la relación `beneficiary`
                        ->where('status', 'Aceptada') // Filtrar solo los Aid con status = 'Aceptada'
                        ->get()
                        ->pluck('beneficiary.name', 'id') // Obtener el nombre del Beneficiary y el id del Aid
                        ->mapWithKeys(function ($name, $id) {
                            return [$id => "{$id} - {$name}"]; // Formatear la salida: "id - nombre"
                        })
                        ->toArray();
                })
                ->getSearchResultsUsing(function (string $search) {
                    return Aid::query()
                        ->with('beneficiary') // Cargar la relación `beneficiary`
                        ->where('status', 'Aceptada') // Filtrar solo los Aid con status = 'Aceptada'
                        ->where(function ($query) use ($search) {
                            $query->where('id', 'like', "%{$search}%") // Buscar por `id` del Aid
                                  ->orWhereHas('beneficiary', function ($query) use ($search) {
                                      $query->where('name', 'like', "%{$search}%"); // Buscar por nombre del Beneficiary
                                  });
                        })
                        ->limit(50) // Limitar resultados para mejorar el rendimiento
                        ->get()
                        ->pluck('beneficiary.name', 'id') // Obtener el nombre del Beneficiary y el id del Aid
                        ->mapWithKeys(function ($name, $id) {
                            return [$id => "{$id} - {$name}"]; // Formatear la salida: "id - nombre"
                        })
                        ->toArray();
                })
                ->getOptionLabelUsing(function ($value) {
                    $aid = Aid::with('beneficiary')->find($value); // Buscar el Aid con su Beneficiary
                    return $aid ? "{$aid->id} - {$aid->beneficiary->name}" : null; // Formatear la salida: "id - nombre"
                })
                ->preload(), 
                Forms\Components\TextInput::make('issuer')
                    ->label('Emisor')
                    ->maxLength(255),
                Forms\Components\TextInput::make('exp')
                    ->label('Expiración')
                    ->maxLength(20),
                Forms\Components\DatePicker::make('delivery_date')
                    ->label('Fecha de entrega'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('serie')
                    ->label('Serie')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('number')
                    ->label('Número')
                    ->sortable(),
                Tables\Columns\TextColumn::make('pin')
                    ->label('PIN')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('amount')
                    ->prefix('€ ')
                    ->label('Monto')
                    ->numeric(locale: 'es-ES', decimalPlaces: 2)
                    ->sortable(),
                Tables\Columns\TextColumn::make('aid.id')
                    ->label('Ayuda')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('aid.beneficiary.name')
                    ->label('Usuario')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('issuer')
                    ->label('Emisor')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('exp')
                    ->label('Expiración'),
                Tables\Columns\TextColumn::make('delivery_date')
                    ->label('Fecha de entrega')
                    ->date()
                    ->sortable(),
                Tables\Columns\IconColumn::make('aid_status')
                    ->label('¿Entregada?')
                    ->boolean()
                    ->getStateUsing(fn($record) => !is_null($record->aid_id))
                    ->trueIcon('tabler-circle-check')
                    ->falseIcon('tabler-circle-x')
                    ->trueColor('success')
                    ->falseColor('danger'),
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
            'index' => Pages\ListGiftCards::route('/'),
            'create' => Pages\CreateGiftCard::route('/create'),
            'edit' => Pages\EditGiftCard::route('/{record}/edit'),
        ];
    }
}
