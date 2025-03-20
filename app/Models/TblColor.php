<?php

namespace App\Models;
use Filament\Tables;

use Illuminate\Database\Eloquent\Model;

class TblColor extends Model
{
    //
    protected $table = 'TBL_COLOR';
    protected $primaryKey = 'CODIGO';

    protected function getNameAttribute()
    {
        return $this->DESCRIPCION;
    }

    public static function getFilamentTableColumn() {
        return Tables\Columns\ColorColumn::make('color');
    }
}
