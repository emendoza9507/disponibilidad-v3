<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ManoObra extends Model
{
    //
    protected $table = 'MANO_OBRA';
    protected $primaryKey = 'CODIGOOT';

    protected function ordenTrabajo(): BelongsTo
    {
        return $this->belongsTo(OrdenTrabajo::class, 'CODIGOOT', 'CODIGOOT');
    }
}
