<?php

namespace App\Filament\Taller\Resources;

use App\Filament\Taller\Resources\OrdenTrabajoResource\Pages;
use App\Filament\Taller\Resources\OrdenTrabajoResource\RelationManagers;
use App\Models\OrdenTrabajo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
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
                Forms\Components\TextInput::make('TIPOSERVICIO')
                    ->numeric(),
                Forms\Components\TextInput::make('IMPORTESERVICIO')
                    ->numeric(),
                Forms\Components\TextInput::make('RECEPCIONISTA')
                    ->numeric(),
                Forms\Components\TextInput::make('DEPOSITOENTRADA')
                    ->numeric(),
                Forms\Components\TextInput::make('DEPOSITOSALIDA')
                    ->numeric(),
                Forms\Components\TextInput::make('ESTADO')
                    ->numeric(),
                Forms\Components\TextInput::make('DESCRIPCION')
                    ->maxLength(500),
                Forms\Components\TextInput::make('DIAGNOSTICO')
                    ->maxLength(8000),
                Forms\Components\TextInput::make('DEPARTAMENTO')
                    ->maxLength(20),
                Forms\Components\DateTimePicker::make('FECHACIERRE'),
                Forms\Components\TextInput::make('CONDUCTORSALIDA')
                    ->numeric(),
                Forms\Components\TextInput::make('SERVICIO')
                    ->maxLength(20),
                Forms\Components\TextInput::make('TIPO')
                    ->numeric(),
                Forms\Components\TextInput::make('AGENCIASALIDA')
                    ->maxLength(8),
                Forms\Components\TextInput::make('CONDUCTORENTREGA')
                    ->maxLength(40),
                Forms\Components\TextInput::make('CONDUCTORCLIENTE')
                    ->maxLength(40),
                Forms\Components\TextInput::make('REPUESTOPENDIENTE')
                    ->maxLength(100),
                Forms\Components\TextInput::make('observaciones')
                    ->maxLength(254),
                Forms\Components\TextInput::make('kmsalida')
                    ->numeric(),
                Forms\Components\TextInput::make('diasrep')
                    ->numeric(),
                Forms\Components\TextInput::make('diasterm')
                    ->numeric(),
                Forms\Components\TextInput::make('CIERREFACTURA')
                    ->numeric(),
                Forms\Components\DateTimePicker::make('FINCHAPA'),
                Forms\Components\DateTimePicker::make('FINPINTURA'),
                Forms\Components\TextInput::make('DEPCOSTO')
                    ->maxLength(20),
                Forms\Components\DateTimePicker::make('FECHATASACION'),
                Forms\Components\TextInput::make('DIVISION')
                    ->maxLength(8),
                Forms\Components\TextInput::make('INCREMENTO')
                    ->numeric(),
                Forms\Components\TextInput::make('INCREMENTOREC')
                    ->numeric(),
                Forms\Components\TextInput::make('MANOOBRAMN')
                    ->numeric(),
                Forms\Components\TextInput::make('INCREMENTOMN')
                    ->numeric(),
                Forms\Components\TextInput::make('INCREMENTORECMN')
                    ->numeric(),
                Forms\Components\TextInput::make('IMPORTESERVICIOMN')
                    ->numeric(),
                Forms\Components\TextInput::make('CODIGOOF')
                    ->numeric(),
                Forms\Components\TextInput::make('CIERRE')
                    ->numeric(),
                Forms\Components\TextInput::make('TIPOINSPECCION')
                    ->maxLength(8),
                Forms\Components\TextInput::make('USUARIO_CIERRE')
                    ->maxLength(20),
                Forms\Components\TextInput::make('NOMBREENTREGA')
                    ->maxLength(40),
                Forms\Components\TextInput::make('DIRECCIONENTREGA')
                    ->maxLength(60),
                Forms\Components\TextInput::make('TELEFONOENTREGA')
                    ->maxLength(40),
                Forms\Components\TextInput::make('LICENCIAENTREGA')
                    ->maxLength(40),
                Forms\Components\TextInput::make('COPIAS')
                    ->numeric(),
                Forms\Components\TextInput::make('Prisma')
                    ->required()
                    ->maxLength(50),
                Forms\Components\DateTimePicker::make('FECHAGARANTIA'),
                Forms\Components\TextInput::make('TipoOT')
                    ->maxLength(20),
                Forms\Components\TextInput::make('PREFERENCIA')
                    ->maxLength(20),
                Forms\Components\TextInput::make('TipoAveria')
                    ->numeric(),
                Forms\Components\TextInput::make('EspecTecnicaTaller')
                    ->maxLength(10),
                Forms\Components\TextInput::make('Componente')
                    ->required()
                    ->maxLength(10),
                Forms\Components\TextInput::make('Generada')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('Concepto')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('Origen')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('CODIGOOTRef')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('TIEMPO')
                    ->numeric(),
                Forms\Components\TextInput::make('SubTipoOT')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('ElaboraSOLOT')
                    ->numeric(),
                Forms\Components\TextInput::make('UbicacionT')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('COSTOINDIRECTO')
                    ->numeric(),
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
            'index' => Pages\ListOrdenTrabajos::route('/'),
            'create' => Pages\CreateOrdenTrabajo::route('/create'),
            'edit' => Pages\EditOrdenTrabajo::route('/{record}/edit'),
        ];
    }
}
