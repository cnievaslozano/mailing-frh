<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;

class Reserva extends Model
{
    protected $connection = 'sqlsrv_pms';
    protected $table = 'HRESERVASCAB';
    protected $primaryKey = 'IDRESERVA';

    // Scope para obtener reservas con check-in en 2 días
        public function scopeConCheckinEnDosDias(Builder $query)
        {
            $start = Carbon::now()->startOfDay()->format('Y-m-d\T00:00:00.000');
            $end = Carbon::now()->addDays(1)->endOfDay()->format('Y-m-d\T23:59:59.999');

            return $query
                ->whereBetween('FECHAENTRADA', [$start, $end])
                ->where('ESTADORESERVA', '!=', 6) // Estado diferente de "Anulada"
                ->where('ESTADORESERVA', '!=', 10) // Estado diferente de "Finalizada"
                ->whereNull('MAILCHECKINENVIADO');
        }


    // Relación con HRESERVAS
    public function detalles()
    {
        return $this->hasMany(ReservaDetalle::class, 'IDRESERVA', 'IDRESERVA');
    }
}
