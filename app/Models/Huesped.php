<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Huesped extends Model
{
    protected $connection = 'sqlsrv_pms'; 
    protected $table = 'HOCUPANTESRESERVA';
    protected $primaryKey = 'IDRESERVA';



    // Relación con HRESERVAS
    public function reserva()
    {
        return $this->belongsTo(ReservaDetalle::class, 'IDRESERVA', 'IDRESERVA');
    }
}
