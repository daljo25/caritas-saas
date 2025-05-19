<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TenantResource\Pages;
use App\Filament\Resources\TenantResource\RelationManagers;
use App\Models\Tenant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TenantResource extends Resource
{
    protected static ?string $model = Tenant::class;
    protected static ?string $navigationGroup = 'Parroquias';
    protected static ?int $navigationSort = 2;
    protected static ?string $navigationLabel = 'Parroquias';
    protected static ?string $label = 'Parroquia';
    protected static ?string $pluralLabel = 'Parroquias';
    protected static ?string $navigationIcon = 'tabler-building-church';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                ->label('ID del Tenant')
                ->required()
                ->unique(ignoreRecord: true),

            Forms\Components\TextInput::make('domain')
                ->label('Dominio del Tenant')
                ->required()
                ->helperText('Ejemplo: parroquia1.micaritas.test')
                ->dehydrated()
                ->afterStateHydrated(fn () => null),

            Forms\Components\TextInput::make('admin_name')
                ->label('Nombre del administrador')
                ->required()
                ->dehydrated()
                ->afterStateHydrated(fn () => null),

            Forms\Components\TextInput::make('admin_email')
                ->label('Email del administrador')
                ->email()
                ->required()
                ->dehydrated()
                ->afterStateHydrated(fn () => null),

            Forms\Components\TextInput::make('admin_password')
                ->label('Contraseña del administrador')
                ->password()
                ->required()
                ->minLength(6)
                ->dehydrated()
                ->afterStateHydrated(fn () => null),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID del Tenant')
                    ->searchable(),

                Tables\Columns\TextColumn::make('domain')
                    ->label('Dominio')
                    ->searchable(),

                Tables\Columns\TextColumn::make('admin_name')
                    ->label('Nombre del administrador')
                    ->searchable(),

                Tables\Columns\TextColumn::make('admin_email')
                    ->label('Email del administrador')
                    ->searchable(),
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
            'index' => Pages\ListTenants::route('/'),
            'create' => Pages\CreateTenant::route('/create'),
            'edit' => Pages\EditTenant::route('/{record}/edit'),
        ];
    }
}
