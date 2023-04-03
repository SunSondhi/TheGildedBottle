<?php


namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Baskets;
use App\Models\Basket_product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Product;
class MemberTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_membership_price()
    {
      #get preset test user
      $user = User::find("3");
      $user->membership_role = 3; //set user to gilded member
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
      $product->price = (21*0.85);
      $product->quantity = 1;
      $product->baskets_id = $basket->id;
      $product->image = "test";

      $test_item = Product::whereName("Disaronno")->first();#compare to existing product

      
      $product->save();
  
      $response = $this->post('/basket');

      $response->assertEquals($product->price,$test_item->price*0.85);#should be 85% of original product price
    }

    public function test_membership_display()
    {

      #get preset test user
      $user = User::find("3");
      $user_id = $user->id;
      $user->membership_role = 3; //set user to gilded member
      #make or get basket for test user
      $basket = Baskets::firstOrNew(['user_id' => $user_id]);
      $basket->user_id = $user_id;
      $basket->save();
      
      # act as the test user and add the test product to the basket
      $this->actingAs($user);

        $response = $this->get('/products?search_entry=');

        $response->assertStatus(200);
        $response->asserttSee(__(key:'Gilded discount'));
    }
}