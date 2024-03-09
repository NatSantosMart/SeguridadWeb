<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Sample client data
        $clients = [
            [
                'name' => 'Carla',
                'surnames' => 'López Galán',
                'dni' => '24544343E',
                'email' => 'seguridadweb@campusviu.es',
                'password' => bcrypt('S3gur1d4d?W3b'),
                'IBAN' => 'ES9121000418450200051332',
            ],

        ];
        DB::table('users')->insert($clients);
    }
}
