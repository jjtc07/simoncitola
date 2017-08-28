<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Periodo extends Model{

	protected $fillable = [
		'inicio',
		'fin',
		'nombre'
	];

	public function secciones(){
		return $this->hasMany(Seccion::class);
	}

	public function getInicioAttribute($inicio)
    {
        return Carbon::parse($inicio)->format('d-m-Y');
    }

    public function setInicioAttribute($inicio)
    {
        $this->attributes['inicio'] = Carbon::parse($inicio)->toDateString();
    }

    public function getFinAttribute($fin)
    {
        return Carbon::parse($fin)->format('d-m-Y');
    }

    public function setFinAttribute($fin)
    {
        $this->attributes['fin'] = Carbon::parse($fin)->toDateString();
    }


    public static function generarDias($inicio, $fin)
    {
        $inicio     = Carbon::parse($inicio);
        $fin        = Carbon::parse($fin);
        $anioInicio = $inicio->format('Y');
        $anioFin    = $fin->format('Y');

        for ($i=$anioInicio; $i <= $anioFin; $i++) { 

            if(!Dia::where('anio', $i)->limit(1)->count()){ //Se verifica que los dias de ese anio no estén creados aún
                $dias = Dia::getDiasAnio($i);

                foreach ($dias as $dia) {

                    $fecha = Carbon::parse($dia['id']);

                    if($fecha->lt($inicio) || $fecha->gt($fin) || $dia['fin_semana']){
                        $dia['tipo'] = 'libre';
                    }else{
                        $dia['tipo'] = 'escolar';
                    }

                    Dia::create($dia);
                }
            }
        }
    }
}
