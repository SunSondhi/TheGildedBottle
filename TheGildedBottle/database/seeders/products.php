<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class products extends Seeder
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
                'name' => 'Captain Morgan Spice Drum',
                'image' => 'images\morganspice.png',
                'price' => 129,
                'description' => 'The original. The icon. It’s Captain Morgan Original Spiced Gold, flavoured with the taste of vanilla, other natural flavours and spice for an irresistibly sweet yet subtly spiced taste. Versatility is its speciality. Make it hot, make it cold, make it sweet, make it fruity or even make it creamy. Delicious possibilities are there for the making.',
                'quantity' => 1,
                'type' => 'Spirits',
                'productCat' => 'Rum',
                'flavour' => 'Spice',
                'percentage' => 37.5
            ],
            [
                'name' => 'Jameson',
                'image' => 'images\jameson.png',
                'price' => 109,
                'description' => 'Jameson Irish Whiskey is a blended Irish Whiskey',
                'quantity' => 1,
                'type' => 'Spirits',
                'productCat' => 'Whiskey',
                'flavour' => 'original',
                'percentage' => 37.5
            ],
            [
                'name' => 'Smirnoff Vodka',
                'image' => 'images\smirnoff.jpg',
                'price' => 119,
                'description' => 'Our classic premium vodka, filtered ten times for remarkable smoothness, is the accomplice for your favourite Smirnoff vodka cocktails.',
                'quantity' => 1,
                'type' => 'Spirits',
                'productCat' => 'Vodka',
                'flavour' => 'original',
                'percentage' => 40
            ],
            [
                'name' => 'Gordons Dry gin',
                'image' => 'images\GordonDry.jpg',
                'price' => 69,
                'description' => 'Gordon’s London Dry Gin is made with only the finest botanicals, all carefully distilled to create its distinctively refreshing taste.',
                'quantity' => 1,
                'type' => 'Spirits',
                'productCat' => 'Gin',
                'flavour' => 'original',
                'percentage' => 37.5
            ],
            [
                'name' => 'Gordons Pink gin',
                'image' => 'images\Gordonpink.jfif',
                'price' => 69,
                'description' => 'Inspired by an original Gordon’s recipe from the 1880s. Delicately fruity sweetness, delicious smell and subtler touch of junipers.',
                'quantity' => 1,
                'type' => 'Spirits',
                'productCat' => 'Gin',
                'flavour' => 'Pink',
                'percentage' => 37.5
            ],

        ];

        foreach ($products as $key => $value) {
            Product::create($value);
        }
    }
}
