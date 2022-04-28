<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
        $admin->name = 'Administrador';
        $admin->email = 'admin@gmail.com';
        $admin->password = Hash::make('12345678');
        $admin->tipo = 0;
        $admin->save();
    }
}
