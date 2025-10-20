<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class usersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //acao executavel
        User::create([
            'firtsName' => 'Felipe',
            'lastName'  => 'Pereira',
            'email'     => 'contato@felipe.com',
            'password'=> bcrypt('12345678'),
        ]);
    }
}
