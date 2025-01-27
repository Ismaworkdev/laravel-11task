<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // Asegúrate de importar el modelo User
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userr = new User();
        $userr->name = 'admin12';
        $userr->email = 'admin12@gmail.com';
        $userr->email_verified_at = now();
        $userr->password = bcrypt('LBb98nQutaM#hTA'); // Asegúrate de encriptar la contraseña
        $userr->remember_token = Str::random(10);
        $userr->save();
    }
}

