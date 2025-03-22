<?php

namespace App\Filament\Taller\Resources\OrdenTrabajoResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ManoObrasRelationManager extends RelationManager
{
    protected static string $relationship = 'manoObras';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('DESCRIPCION')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('IMPORTE')
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('DESCRIPCION')
            ->columns([
                Tables\Columns\TextColumn::make('DESCRIPCION')
                    ->label('DESCRIPCION'),
                Tables\Columns\TextColumn::make('IMPORTELINEA')
                    ->label('IMPORTELINEA')
                    ->money('CUC', 0, 'es'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
