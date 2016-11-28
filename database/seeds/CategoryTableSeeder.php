<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table("categories")->truncate(); //retirado o truncate pois estou utilizando o postgresql. e esta apresentando erro de dependencia de FK na hora apagar a tabela
        DB::table("categories")->delete();
        factory(CodeCommerce\Category::class,15)->create();
    }
}
