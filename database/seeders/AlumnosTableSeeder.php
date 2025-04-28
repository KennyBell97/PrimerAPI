<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class AlumnosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create(); // Crear un generador de datos falsos

        // Insertar 10 registros de ejemplo en la tabla 'alumnos'
        for ($i = 0; $i < 10; $i++) {
            DB::table('alumnos')->insert([
                'nombre' => $faker->name, // Genera un nombre aleatorio
                'telefono' => $faker->phoneNumber, // Genera un teléfono aleatorio
                'edad' => rand(18, 30), // Edad aleatoria entre 18 y 30 años
                'password' => bcrypt('contraseña123'), // Contraseña cifrada
                'email' => $faker->unique()->safeEmail, // Genera un correo electrónico único
                'genero' => $faker->randomElement(['M', 'F']), // Género aleatorio
            ]);
        }
    }
}