<?php

namespace App\Filament\Tenant\Resources;

use App\Filament\Tenant\Resources\DerivationResource\Pages;
use App\Filament\Tenant\Resources\DerivationResource\RelationManagers;
use App\Models\Derivation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DerivationResource extends Resource
{
    protected static ?string $model = Derivation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListDerivations::route('/'),
            'create' => Pages\CreateDerivation::route('/create'),
            'edit' => Pages\EditDerivation::route('/{record}/edit'),
        ];
    }
}
