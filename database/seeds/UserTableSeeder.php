<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->truncate();

        CodeCommerce\User::create(['name'=>'bart', 'email'=>'bart@gmail.com', 'password'=>bcrypt('123456'), 'remember_token'=>'123456', 'is_admin'=>'1', 'endereco'=>'Rua Sete', 'bairro'=>'Nova Esperança', 'municipio'=>'Rio de Janeiro', 'estado'=>'RJ']);

        factory(CodeCommerce\User::class,5)->create();
    }
}
