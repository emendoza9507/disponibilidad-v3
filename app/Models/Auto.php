<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Filament\Tables;
class Auto extends Model
{
    //
    protected $table = 'MAESTRO';
    protected $primaryKey = 'CODIGOM';

    const COLUMN_ESTADOVEHICULO = 'ESTADO';

    public function superMaestro()
    {
        return $this->belongsTo(SuperMaestro::class, 'CODIGOSM', 'CODIGOSM');
    }

    public function tblColor(): BelongsTo
    {
        return $this->belongsTo(TblColor::class, 'COLOR', 'CODIGO');
    }

    public function estadoVehiculo(): BelongsTo
    {
        return $this->belongsTo(
            TblEstadoVehiculo::class,
            'ESTADO',
            'CODIGO'
        );
    }

    public static function columnFilamentTableEstadoVehiculo() {
        return Tables\Columns\TextColumn::make('estadoVehiculo.DESCRIPCION')
            ->label('ESTADO')
            ->badge()
            ->color(function($state, $record) {
                return match($record->estadoVehiculo->CODIGO) {
                    'AVER' => 'danger',
                    'MANT' => 'warning',
                    'SERV' => 'success',
                    'DISP' => 'info',
                    'REPA' => 'danger',
                    '00' => 'secondary',
                    default => 'secondary',
                };
            });
    }
}
