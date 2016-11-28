<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table("products")->truncate();
        factory(CodeCommerce\Product::class,30)->create();
    }
}
