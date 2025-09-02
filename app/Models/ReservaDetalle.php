<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReservaDetalle extends Model
{
    protected $connection = 'sqlsrv_pms';
    protected $table = 'HRESERVAS';
    protected $primaryKey = 'IDRESERVA';

    // Relación con HRESERVASCAB
    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'IDRESERVA', 'IDRESERVA');
    }

    // Relación con HOCUPANTESRESERVA
    public function huespedes()
    {
        return $this->hasMany(Huesped::class, 'IDRESERVA', 'IDRESERVA');
    }
}
