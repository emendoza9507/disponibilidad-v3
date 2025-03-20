<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Filament\Tables;

class TblEstadoVehiculo extends Model
{

    const FIXED_COLUMNS = [
        'CODIGO',
        'DESCRIPCION'
    ];

    const COLUMN_CODIGO = 'CODIGO';
    const COLUMN_DESCRIPCION = 'DESCRIPCION';

    //
    protected $table = 'TBL_ESTADOVEHICULO';
    protected $primaryKey = 'CODIGO';
    protected $keyType = 'string';

    public static function getFilamentTableColumn() {
        return Tables\Columns\ColorColumn::make('color');
    }
}
