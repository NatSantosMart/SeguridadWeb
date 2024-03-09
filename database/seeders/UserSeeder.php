<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        $clients = [
            [
                'name' => 'Carla',
                'surnames' => 'López Galán',
                'dni' => '24544343E',
                'email' => 'seguridadweb@campusviu.es',
                'password' => bcrypt('S3gur1d4d?W3b'),
                'IBAN' => 'ES9121000418450200051332',
            ],
            [
                'name' => 'Lucas',
                'surnames' => 'Santos Herraiz',
                'dni' => '14544343E',
                'email' => 'lucas@gmail.es',
                'password' => bcrypt('password1234'),
                'IBAN' => 'ES9121000418450200051332',
            ],
            [
                'name' => 'Marta',
                'surnames' => 'Cañamares Herraiz',
                'phone' => '676543456',
                'dni' => '34544343E',
                'email' => 'marta@gmail.es',
                'password' => bcrypt('password1234'),
                'IBAN' => 'ES9121000418450200051331',
            ],

        ];
        DB::table('users')->insert($clients);
    }
}
