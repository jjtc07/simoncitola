<?php

use Illuminate\Database\Seeder;

use App\Models\Dia;

class DiaSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $datos = [
            [
                'id'          => '2017-04-01',
                'dia'         => 01,
                'mes'         => 5,
                'anio'        => 2017,
                'semana_mes'  => 3,
                'semana_anio' => 16,
                'fin_semana'  => 0,
                'dia_semana'  => 1,
                'tipo'        => 'escolar'
            ],
            [
                'id'          => '2017-04-02',
                'dia'         => 02,
                'mes'         => 5,
                'anio'        => 2017,
                'semana_mes'  => 3,
                'semana_anio' => 16,
                'fin_semana'  => 0,
                'dia_semana'  => 2,
                'tipo'        => 'libre'
            ],
            [
                'id'          => '2017-04-03',
                'dia'         => 03,
                'mes'         => 5,
                'anio'        => 2017,
                'semana_mes'  => 3,
                'semana_anio' => 16,
                'fin_semana'  => 0,
                'dia_semana'  => 3,
                'tipo'        => 'escolar'
            ],
            [
                'id'          => '2017-04-04',
                'dia'         => 04,
                'mes'         => 5,
                'anio'        => 2017,
                'semana_mes'  => 3,
                'semana_anio' => 16,
                'fin_semana'  => 0,
                'dia_semana'  => 4,
                'tipo'        => 'administrativo'
            ],
            [
                'id'          => '2017-04-05',
                'dia'         => 05,
                'mes'         => 5,
                'anio'        => 2017,
                'semana_mes'  => 3,
                'semana_anio' => 16,
                'fin_semana'  => 0,
                'dia_semana'  => 5,
                'tipo'        => 'administrativo'
            ],
            [
                'id'          => '2017-04-06',
                'dia'         => 06,
                'mes'         => 5,
                'anio'        => 2017,
                'semana_mes'  => 3,
                'semana_anio' => 16,
                'fin_semana'  => 1,
                'dia_semana'  => 6,
                'tipo'        => 'libre'
            ],
            [
                'id'          => '2017-04-07',
                'dia'         => 07,
                'mes'         => 5,
                'anio'        => 2017,
                'semana_mes'  => 3,
                'semana_anio' => 16,
                'fin_semana'  => 1,
                'dia_semana'  => 7,
                'tipo'        => 'libre'
            ]
        ];

        foreach ($datos as $dato) {
            Dia::create($dato);
        }
    }
}
