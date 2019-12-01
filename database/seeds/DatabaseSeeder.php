<?php

use App\Beneficiario;
use App\Donacion;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Donacion::truncate();
        Beneficiario::truncate();

        factory(User::class, 1)->create();
        factory(Beneficiario::class, 5)->create();
        factory(Donacion::class, 20)->create();
    }
}
