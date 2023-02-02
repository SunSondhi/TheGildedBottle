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
                'productCat' => 'Rum',
                'flavour' => 'Spice',
                'percentage' => 37.5
            ],
        ];

        foreach ($products as $key => $value) {
            Product::create($value);
        }
    }
}
