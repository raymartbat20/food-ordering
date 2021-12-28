<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    const DEFAULT_CATEGORIES = ['burgers','drinks','combo_meals'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::DEFAULT_CATEGORIES as $category){
            DB::table('categories')->insert([
                'name' => $category
            ]);
        }
    }
}
