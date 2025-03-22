<?php

namespace App\Filament\Taller\Resources;

use App\Filament\Taller\Resources\OrdenTrabajoResource\Pages;
use App\Filament\Taller\Resources\OrdenTrabajoResource\RelationManagers;
use App\Models\Auto;
use App\Models\OrdenTrabajo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\FiltersLayout;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdenTrabajoResource extends Resource
{
    protected static ?string $model = OrdenTrabajo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('CODIGOTALLER')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('CODIGOM')
                    ->numeric(),
                Forms\Components\DateTimePicker::make('FECHAENTRADA'),
                Forms\Components\DateTimePicker::make('FECHASALIDA'),
                Forms\Components\TextInput::make('KMENTRADA')
                    ->numeric(),
                Forms\Components\TextInput::make('MATRICULA')
                    ->maxLength(24),
                Forms\Components\TextInput::make('NUMACTI')
                    ->numeric(),
                Forms\Components\TextInput::make('CONDUCTOR')
                    ->numeric(),
                Forms\Components\TextInput::make('RECEPCIONISTA')
                    ->numeric(),
                Forms\Components\TextInput::make('DEPOSITOENTRADA')
                    ->numeric(),
                Forms\Components\TextInput::make('DEPOSITOSALIDA')
                    ->numeric(),
                Forms\Components\TextInput::make('ESTADO')
                    ->numeric(),
                Forms\Components\TextInput::make('DIAGNOSTICO')
                    ->maxLength(8000),
                Forms\Components\TextInput::make('DEPARTAMENTO')
                    ->maxLength(20),
                Forms\Components\DateTimePicker::make('FECHACIERRE'),
                Forms\Components\TextInput::make('observaciones')
                    ->maxLength(254),
                Forms\Components\TextInput::make('CIERREFACTURA')
                    ->numeric(),
                Forms\Components\TextInput::make('CIERRE')
                    ->numeric(),
                Forms\Components\TextInput::make('TIPOINSPECCION')
                    ->maxLength(8),
                Forms\Components\TextInput::make('USUARIO_CIERRE')
                    ->maxLength(20),
                Forms\Components\TextInput::make('Prisma')
                    ->required()
                    ->maxLength(50),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('CODIGOTALLER')
                    ->searchable()
                    ->label('TALLER'),
                Tables\Columns\TextColumn::make('CODIGOOT')
                    ->sortable()
                    ->label('OT'),
                Tables\Columns\TextColumn::make('auto.MATRICULA')
                    ->sortable()
                    ->label('MATRICULA'),
                Tables\Columns\TextColumn::make('FECHAENTRADA')
                    ->dateTime()
                    ->sortable()
                    ->label('FECHA ENTRADA')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('FECHASALIDA')
                    ->dateTime()
                    ->sortable()
                    ->label('FECHA SALIDA')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('KMENTRADA')
                    ->numeric()
                    ->sortable()
                    ->label('KMENTRADA')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('IMPORTESERVICIO')
                    ->numeric()
                    ->money('USD', config('app.currency_precision', 128))
                    ->sortable()
                    ->label('IMPORTE USD'),
                Tables\Columns\TextColumn::make('IMPORTESERVICIO_CUC')
                    ->getStateUsing(fn($record) => $record->IMPORTESERVICIO)
                    ->numeric()
                    ->money('CUP', locale: 'es')
                    ->sortable()
                    ->label('IMPORTE CUP'),
                Tables\Columns\TextColumn::make('otRecepcionista.NOMBRE')
                    ->numeric()
                    ->sortable()
                    ->label('RECEPCIONISTA')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('DEPOSITOENTRADA')
                    ->numeric()
                    ->numeric()
                    ->sortable()
                    ->label('DEPOSITOENTRADA')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('DEPOSITOSALIDA')
                    ->numeric()
                    ->sortable()
                    ->label('DEPOSITOSALIDA')
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('ESTADO')
                    ->numeric()
                    ->sortable()
                    ->label('ESTADO')
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                //
                Tables\Filters\SelectFilter::make('CODIGOTALLER')
                    ->label('Taller')
                    ->options([
                        'JOSEF' => 'JOSEFINA',
                        'PASEO' => 'PASEO',
                        'ACOS' => 'PRIMELLES'
                    ]),
                Tables\Filters\SelectFilter::make('MATRICULA')
                    ->label('MATRICULA')
                    ->options(fn() => Auto::isActivo()->where('MATRICULA', '<>' ,null)->pluck('MATRICULA', 'MATRICULA'))
                    ->preload()
                    ->searchable()
            ], FiltersLayout::AboveContent)
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
            RelationManagers\ManoObrasRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrdenTrabajos::route('/'),
            'create' => Pages\CreateOrdenTrabajo::route('/create'),
            'edit' => Pages\EditOrdenTrabajo::route('/{record}/edit'),
        ];
    }
}
