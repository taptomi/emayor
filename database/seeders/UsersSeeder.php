<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Tapolcai Tamás',
            'email' => 'tapolcai.tamas@tm-it.hu',
            'password'=>password_hash('LFqZx19p8B1234!',PASSWORD_DEFAULT)
        ]);

        User::factory()->create([
             'name' => 'Pucher Marko',
             'email' => 'pucher.marko@tm-it.hu',
            'password'=>password_hash('LFqZx19p8B1234!',PASSWORD_DEFAULT)
         ]);

        User::factory()->create([
            'name' => 'TM Infotech Kft',
            'email' => 'info@tm-it.hu',
            'password'=>password_hash('LFqZx19p8B1234!',PASSWORD_DEFAULT)
        ]);
    }
}
