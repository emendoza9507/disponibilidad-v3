<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TblDepartamento extends Model
{
    //
    protected $table = 'TBL_DEPARTAMENTOS';
    protected $primaryKey = 'CODIGO';
    protected $keyType = 'string';
}
