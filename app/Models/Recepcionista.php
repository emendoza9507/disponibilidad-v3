<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recepcionista extends Model
{
    //
    protected $table = 'RECEPCIONISTA';
    protected $primaryKey = 'CODIGO';
    public $timestamps = false;

    public function ordenTrabajo(): HasMany
    {
        return $this->hasMany(OrdenTrabajo::class, 'RECEPCIONISTA', 'CODIGO');
    }
}
