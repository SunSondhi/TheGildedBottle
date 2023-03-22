<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Baskets;
use App\Models\Basket_product;
use Illuminate\Database\Eloquent\Factories\Factory;
class BuyTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_buy_function()
    {

       $response = $this->call('POST', '/basket');
    }
    public function test_right_register()
    {

       $response = $this->post('/register', [
        'name' => 'Test',
        'email' => 'this_is_a_test@gmail.com',
        'password' => 'Test2234',
        'password_confirmation' => 'Test2234',
       ]);

       $response->assertRedirect('/home');
    }

    public function test_wrong_register()
    {

       $response = $this->post('/register', [
        'name' => 'Test',
        'email' => 'this_is_a_test@gmail.com',
        'password' => 'Test2234',
        'password_confirmation' => 'podsfa',
       ]);

       $response->assertRedirect('/');
    }

    public function test_passfail_register()
    {

       $response = $this->post('/register', [
        'name' => 'Test',
        'email' => 'this_is_a_test@gmail.com',
        'password' => 'test',
        'password_confirmation' => 'podsfa',
       ]);

       $response->assertRedirect('/');
    }

    public function test_buy()
    {
       $user = User::find("3");
       $user_id = $user->id;

       $basket = Baskets::firstOrNew(['user_id' => $user_id]);
       $basket->user_id = $user_id;
       $basket->save();
       
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

    public function test_out_of_stock()
    {
       $user = User::find("3");
       $user_id = $user->id;

       $basket = Baskets::firstOrNew(['user_id' => $user_id]);
       $basket->user_id = $user_id;
       $basket->save();
       
       $this->actingAs($user);
       $product = new Basket_product();
       $product->id = 1;
       $product->name = "test";
       $product->price = 5;
       $product->quantity = 300;
       $product->baskets_id = $basket->id;
       $product->image = "test";
       
       $product->save();
   
       $response = $this->post('/basket');

       $response->assertRedirect('/');
    }
}
