<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            'Estados Unidos',
            'China',
            'India',
            'Japón',
            'Alemania',
            'Reino Unido',
            'Francia',
            'Brasil',
            'Italia',
            'Canadá',
            'Rusia',
            'Corea del Sur',
            'Australia',
            'España',
            'México',
            'Indonesia',
            'Arabia Saudita',
            'Turquía',
            'Suiza',
            'Suecia',
            'Polonia',
            'Bélgica',
            'Noruega',
            'Austria',
            'Emiratos Árabes Unidos',
            'Irán',
            'Israel',
            'Argentina',
            'Irlanda',
            'Países Bajos',

        ];

        $data = [];
        foreach ($countries as $country) {
            $data[] = [
                'name' => $country,
            ];
        }

        // Insertar países en la base de datos
        DB::table('countries')->insert($data);
    }
}
