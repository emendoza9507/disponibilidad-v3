<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrdenTrabajo extends Model
{
    //
    protected $table = 'ORDEN_TRABAJO';
    protected $primaryKey = 'CODIGOOT';
    public $timestamps = false;

    public function tblDepartamento(): BelongsTo
    {
        return $this->belongsTo(TblDepartamento::class, 'DEPARTAMENTO', 'CODIGO');
    }

    public function otRecepcionista(): BelongsTo
    {
        return $this->belongsTo(Recepcionista::class, 'RECEPCIONISTA', 'CODIGO');
    }

    public function auto(): BelongsTo
    {
        return $this->belongsTo(Auto::class, 'CODIGOM', 'CODIGOM');
    }

    public function manoObras(): HasMany
    {
        return $this->hasMany(ManoObra::class, 'CODIGOOT', 'CODIGOOT');
    }
}
