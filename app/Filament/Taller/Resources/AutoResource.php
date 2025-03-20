<?php

namespace App\Filament\Taller\Resources;

use App\Filament\Taller\Resources\AutoResource\Pages;
use App\Filament\Taller\Resources\AutoResource\RelationManagers;
use App\Models\Auto;
use App\Models\SuperMaestro;
use App\Models\TblEstadoVehiculo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AutoResource extends Resource
{
    protected static ?string $model = Auto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function(Builder $query) {
                return $query->where('FECHABAJA', '=', null);
            })
            ->columns([
                Tables\Columns\TextColumn::make('MATRICULA')
                    ->label('MATRICULA')
                    ->searchable()
                    ->formatStateUsing(function ($record) {
                        if ($record->MATRICULA == NULL) {
                            return 'N/A';
                        }

                        return $record->MATRICULA;
                    }),
                Tables\Columns\TextColumn::make('CODIGOM')
                    ->label('CODIGOM'),
                Tables\Columns\TextColumn::make('superMaestro.MARCA')
                    ->searchable()
                    ->label('MARCA'),
                Tables\Columns\TextColumn::make('superMaestro.MODELO')
                    ->searchable()
                    ->label('MODELO'),

                Tables\Columns\TextColumn::make('tblColor.name')
                    ->label('COLOR')
                    ->badge()
                    ->color(function($record) {
                        return match($record->tblColor->DESCRIPCION) {
                            'Amarillo' => '100:100:0',
                            'Amarillo Azul' => '100:100:0',
                            'Arena' => '100:100:0',
                            'Azul' => '0:0:100',
                            'Azul-Amarillo' => '0:0:100',
                            'Azul-Blanco' => '0:0:100',
                            'Azul-Gris' => '0:0:100',
                            'Azul-Rojo' => '0:0:100',
                            'Beige' => '100:100:0',
                            'Blanco' => 'FFFFFF',
                            'Oro' => '100:100:0',
                            'Carmelita' => '100:100:0',
                            'Gris' => '100:green',
                            'Lila' => '80:0:80',
                            'Naranja' => '100:100:0',
                            'Negro' => '0:0:0',
                            'Rojo' => '#FF0000',
                            'Rojo Amarillo' => 'FFA500',
                            'Rojo Negro' => 'FF0000',
                            'Silver' => 'C0C0C0',
                            'Verde' => '008000',
                            'Amarillo Verde' => 'FFD700',
                            'Amarillo Ocre' => 'FFD700',
                            'Amarillo Blanco' => 'FFD700',
                            'Azul Blanco' => '0000FF',
                            'Azul Negro' => '0000FF',
                            'Azul Gris' => '0000FF',
                            'Azul Oscuro' => '0000FF',
                            'Azul Rojo Verde' => '0000FF',
                            'Azul Rojo' => '0000FF',
                            'B-A-R' => '0000FF',
                            'Blanco Negro' => 'FFFFFF',
                            'B-R-A' => '0000FF',
                            'B-R-N' => '0000FF',
                            'Blanco Azul' => 'FFFFFF',
                            'Blanco Carmelita' => 'FFFFFF',
                            'Blanco Gris' => 'FFFFFF',
                            'Blanco Verde' => 'FFFFFF',
                            'Blanco Rojo' => 'FFFFFF',
                            'Blanco Amarillo' => 'FFFFFF',
                            'Celeste' => '0000FF',
                            'Coral' => 'FF7F50',
                            'Gris Aluminio' => '808080',
                            'Gris Magenta' => '800080',
                            'Gris Negro' => '808080',
                            'Gris Oscuro' => '808080',
                            'Gris Rojo' => '808080',
                            'Gris Blanco' => '808080',
                            'Gris Azul' => '808080',
                            'Gris Verde' => '808080',
                            'Marron' => '800000',
                            'Monaco Blau Metaliz.' => '0000FF',
                            'Morado' => '800080',
                            'Orient Blau Metaliz.' => '0000FF',
                            'Oro Blanco' => 'FFD700',
                            'Plata' => 'C0C0C0',
                            'Plateado' => 'C0C0C0',
                            'Purpura' => '800080',
                            'Rojo Blanco' => 'FF0000',
                            'Rojo Coral' => 'FF7F50',
                            'Rojo Azul' => 'FF0000',
                            'Rojo Gris' => 'FF0000',
                            'Rosado' => 'FF0000',
                            'Silvergrau Metalizado' => '808080',
                            'Titan Silver metal' => '808080',
                            'Verde Gris' => '808080',
                            'Verde Blanco' => '808080',
                            'Verde Claro' => '808080',
                            'Verde Amarillo' => '808080',
                            'Verde Negro' => '808080',
                            'Violeta' => '800080',
                            'Rosa' => 'FF0000',
                            'Rojo Verde' => 'FF0000',
                            'Azul Noche' => '0000FF',
                            'Sin Definir' => '000000',
                            'Amarillo' => 'FFD700',
                            'Amarillo Azul' => 'FFD700',
                            'Arena' => 'FFD700',
                            'Azul' => '0000FF',
                            'Azul-Amarillo' => '0000FF',
                            'Azul-Blanco' => '0000FF',
                            'Azul-Gris' => '0000FF',
                            'Azul-Rojo' => '0000FF',
                            'Beige' => 'FFD700',
                            'Blanco' => 'FFFFFF',
                            'Oro' => 'FFD700',
                            'Carmelita' => 'FFD700',
                            'Gris' => '808080',
                            'Lila' => '800080',
                            'Naranja' => 'FFA500',
                            'Negro' => '000000',
                            'Rojo' => 'FF0000',
                            'Rojo Amarillo' => 'FFA500',
                            'Rojo Negro' => 'FF0000',
                            'Silver' => 'C0C0C0',
                            'Verde' => '008000',
                            'Amarillo Verde' => 'FFD700',
                            'Amarillo Ocre' => 'FFD700',
                            'Amarillo Blanco' => 'FFD700',
                            'Azul Blanco' => '0000FF',
                            'Azul Negro' => '0000FF',
                            'Azul Gris' => '0000FF',
                            'Azul Oscuro' => '0000FF',
                            'Azul Rojo Verde' => '0000FF',
                            'Azul Rojo' => '0000FF',
                            'B-A-R' => '0000FF',
                            'Blanco Negro' => 'FFFFFF',
                            'B-R-A' => '0000FF',
                            'B-R-N' => '0000FF',
                            'Blanco Azul' => 'FFFFFF',
                            'Blanco Carmelita' => 'FFFFFF',
                            'Blanco Gris' => 'FFFFFF',
                            'Blanco Verde' => 'FFFFFF',
                            'Blanco Rojo' => 'FFFFFF',
                            'Blanco Amarillo' => 'FFFFFF',
                            'Celeste' => '0000FF',
                            'Coral' => 'FF7F50',
                            'Gris Aluminio' => '808080',
                            'Gris Magenta' => '800080',
                            'Gris Negro' => '808080',
                            'Gris Oscuro' => '808080',
                            'Gris Rojo' => '808080',
                            'Gris Blanco' => '808080',
                            'Gris Azul' => '808080',
                            'Gris Verde' => '808080',
                            'Marron' => '800000',
                            'Monaco Blau Metaliz.' => '0000FF',
                            'Morado' => '800080',
                            'Orient Blau Metaliz.' => '0000FF',
                            'Oro Blanco' => 'FFD700',
                            'Plata' => 'C0C0C0',
                            'Plateado' => 'C0C0C0',
                            'Purpura' => '800080',
                            'Rojo Blanco' => 'FF0000',
                            'Rojo Coral' => 'FF7F50',
                            'Rojo Azul' => 'FF0000',
                            'Rojo Gris' => 'FF0000',
                            'Rosado' => 'FF0000',
                            'Silvergrau Metalizado' => '808080',
                            'Titan Silver metal' => '808080',
                            'Verde Gris' => '808080',
                            'Verde Blanco' => '808080',
                            'Verde Claro' => '808080',
                            'Verde Amarillo' => '808080',
                            'Verde Negro' => '808080',
                            'Violeta' => '800080',
                            'Rosa' => 'FF0000',
                            'Rojo Verde' => 'FF0000',
                            'Azul Noche' => '0000FF',
                            default => '000000',
                        };
                    }),
                Auto::columnFilamentTableEstadoVehiculo(),
                Tables\Columns\TextColumn::make('superMaestro.TIPO')
                    ->label('TIPO'),

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
            'index' => Pages\ListAutos::route('/'),
            'create' => Pages\CreateAuto::route('/create'),
            'edit' => Pages\EditAuto::route('/{record}/edit'),
        ];
    }
}
