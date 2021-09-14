<?php

namespace Database\Seeders;

use App\Models\Products;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [

            [

                'p_name' => 'Samsung Galaxy',

                'p_description' => 'Samsung Brand',

                'p_image' => 'https://dummyimage.com/200x300/000/fff&text=Samsung',

                'p_price' => 100,

                'p_image_path' => 'https://dummyimage.com/200x300/000/fff&text=Samsung'

            ],

            [

                'p_name' => 'Apple iPhone 12',

                'p_description' => 'Apple Brand',

                'p_image' => 'https://dummyimage.com/200x300/000/fff&text=Iphone',

                'p_price' => 500,

                'p_image_path' => 'https://dummyimage.com/200x300/000/fff&text=Iphone',

            ],

            [

                'p_name' => 'Google Pixel 2 XL',

                'p_description' => 'Google Pixel Brand',

                'p_image' => 'https://dummyimage.com/200x300/000/fff&text=Google',

                'p_price' => 400,

                'p_image_path' => 'https://dummyimage.com/200x300/000/fff&text=Google',

            ],

            [

                'p_name' => 'LG V10 H800',

                'p_description' => 'LG Brand',

                'p_image' => 'https://dummyimage.com/200x300/000/fff&text=LG',

                'p_price' => 200,

                'p_image_path' => 'https://dummyimage.com/200x300/000/fff&text=LG',

            ]

        ];

        foreach ($products as $key => $value) {

            Products::create($value);

        }
    }
}
