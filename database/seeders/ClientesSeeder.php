<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClientesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Christian Gutierrez",
            "email" => "christian@gmail.com",
            "password" => bcrypt("1234567890"),
        ])->assignRole("cliente");

        User::create([
            "name" => "Juan Carlos",
            "email" => "juancarlos@gmail.com",
            "password" => bcrypt("1234567890"),
        ])->assignRole("cliente");
    }
}
