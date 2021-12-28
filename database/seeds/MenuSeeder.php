<?php

use App\Category;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    const BURGER_MENU = [
        [
            'name' => 'Jollibee Burger',
            'price' => 45,
            'tax' => 10,
            'category_id' => 1,
        ],
        [
            'name' => 'Mcdo Burger',
            'price' => 45,
            'tax' => 10,
            'category_id' => 1,
        ],
        [
            'name' => 'Burger King',
            'price' => 75,
            'tax' => 10,
            'category_id' => 1,
        ],
        [
            'name' => 'Angel\'s Burger',
            'price' => 20,
            'tax' => 10,
            'category_id' => 1,
        ],
    ];

    const DRINKS_MENU = [
        [
            'name' => 'Coke',
            'price' => 20,
            'tax' => 10,
            'category_id' => 2,
        ],
        [
            'name' => 'Virgin',
            'price' => 18,
            'tax' => 10,
            'category_id' => 2,
        ],
        [
            'name' => 'Mirinda',
            'price' => 15,
            'tax' => 10,
            'category_id' => 2,
        ],
        [
            'name' => 'Coke Float',
            'price' => 45,
            'tax' => 10,
            'category_id' => 2,
        ],
    ];


    const COMBO_MEALS_MENU = [
        [
            'name' => 'Chicken Rice With Fries',
            'price' => 105,
            'tax' => 10,
            'category_id' => 3,
        ],
        [
            'name' => 'Chicken Fries Burger',
            'price' => 140,
            'tax' => 10,
            'category_id' => 3,
        ],
        [
            'name' => 'Spaghetti and Fish Fillet with fries',
            'price' => 180,
            'tax' => 10,
            'category_id' => 3,
        ],
        [
            'name' => 'Ultimate Combo Meal',
            'price' => 200,
            'tax' => 10,
            'category_id' => 3,
        ],
    ];

    const CATEGORIES = [
        self::BURGER_MENU,
        self::DRINKS_MENU,
        self::COMBO_MEALS_MENU
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::CATEGORIES as $category){
            foreach($category as $menu){
                DB::table('menus')->insert([
                    'category_id' => $menu['category_id'],
                    'name' => $menu['name'],
                    'price' => $menu['price'],
                    'tax' => $menu['tax'],
                ]);
            }
        }
    }
}
