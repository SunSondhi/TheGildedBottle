<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Baskets;
use App\Models\Basket_product;
use Illuminate\Database\Eloquent\Factories\Factory;
class BuyTest extends TestCase
{
  

    #tests if user can buy items in stock
    public function test_buy()
    {
      #get preset test user
       $user = User::find("3");
       $user_id = $user->id;

      #make or get basket for test user
       $basket = Baskets::firstOrNew(['user_id' => $user_id]);
       $basket->user_id = $user_id;
       $basket->save();
       # act as the test user and add the test product to the basket
       $this->actingAs($user);
       $product = new Basket_product();
       $product->id = 1;
       $product->name = "test";
       $product->price = 5;
       $product->quantity = 5;
       $product->baskets_id = $basket->id;
       $product->image = "test";
       
       $product->save();
   
       $response = $this->post('/basket');

       $response->assertRedirect('/purchases');
    }

    #tests if user can buy more items than whats in stock
    public function test_out_of_stock()
    {
      #get preset test user
       $user = User::find("3");
       $user_id = $user->id;

       #make or get basket for test user
       $basket = Baskets::firstOrNew(['user_id' => $user_id]);
       $basket->user_id = $user_id;
       $basket->save();
       
       # act as the test user and add the test product to the basket
       $this->actingAs($user);
       $product = new Basket_product();
       $product->id = 1;
       $product->name = "test";
       $product->price = 5;
       $product->quantity = 300; #set quantity outside of stock level range
       $product->baskets_id = $basket->id;
       $product->image = "test";
       
       $product->save();
   
       $response = $this->post('/basket'); #call the buy function on the basket page

       $response->assertRedirect('/purchases');
    }
}
