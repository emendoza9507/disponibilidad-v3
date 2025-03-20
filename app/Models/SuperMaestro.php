<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuperMaestro extends Model
{
    protected $table = 'SUPER_MAESTRO';
    protected $primaryKey = 'CODIGOSM';

    public function auto()
    {
        return $this->hasOne(Auto::class, 'CODIGOSM', 'CODIGOSM');
    }
}
