<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dados=['name'=>"Victor",'username'=>"admin",'email'=>"admin@email",'password'=>bcrypt("12345678")];
        User::create($dados);
    }
}
