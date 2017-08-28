<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EstadoSeeder::class);
        $this->call(CargoSeeder::class);
        $this->call(PeriodoSeeder::class);
        $this->call(DiaSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(ParentescoSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(SeccionSeeder::class);
        //$this->call(UsuarioSeeder::class);
    }
}
