<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(StatusSeeder::class);
         $this->call(TamanhoProdutoSeeder::class);
         $this->call(NivelUsuarioSeeder::class);
         $this->call(UsersSeeder::class);
    }
}
