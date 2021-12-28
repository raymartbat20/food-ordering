<?php

use App\Category;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{

    protected $burger_category_id;
    protected $drinks_category_id;
    protected $combo_meals_category_id;

    public function __construct()
    {
        $this->burger_category_id = Category::where('name','burgers')->pluck('id')->first();
        $this->drinks_category_id = Category::where('name','drinks')->pluck('id')->first();
        $this->combo_meals_category_id = Category::where('name','combo_meals')->pluck('id')->first();

    }
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
        [
            'name' => 'BURGER_MENU',
            'menu' => self::BURGER_MENU
        ],
        [
            'name' => 'DRINKS_MENU',
            'menu' => self::DRINKS_MENU
        ],
        [
            'name' => 'COMBO_MEALS_MENU',
            'menu' => self::COMBO_MEALS_MENU
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(self::CATEGORIES as $category){
            switch ($category['name']){
                case 'BURGER_MENU':
                    $category_id = $this->burger_category_id;
                    break;
                
                case 'DRINKS_MENU':
                    $category_id = $this->drinks_category_id;
                    break;

                case 'COMBO_MEALS_MENU':
                    $category_id = $this->combo_meals_category_id;
                    break;
            }
            foreach($category['menu'] as $menu){
                DB::table('menus')->insert([
                    'category_id' => $category_id,
                    'name' => $menu['name'],
                    'price' => $menu['price'],
                    'tax' => $menu['tax'],
                ]);
            }
        }
    }
}
