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
class SearchTest extends TestCase
{
    
   
    # test whether products page returns all products upon empty entry
    public function test_search()
    {
        $response = $this->get('/products?search_entry=');

        #should not see no products found upon entry
        $response->assertDontSee(__(key:'no products found'));
    }


    #tests whether no products are returned when query does not match products
    public function test_see()
    {
        $response = $this->get('/products?search_entry=item_not_in_database');

        $response->assertDontSee(__(key:'no products found'));
    }


    public function search_test_dont_see()
    {
        $response = $this->get('/products?search_entry=test');

        $response->assertDontSee(__(key:'No products found'));
    }

    #tests whether user can search for particular products and only the products similar to the query are returned
    public function test_a_user_can_search_for()
    {
        #populate database with test products
        $test1 = Product::factory()->create(['name' => 'sucessful_test','price' =>  13,'description' => 'test', 'quantity' => 1,'productCat' => 'rum', 'flavour' => 'nice', 'percentage' => 34,'image' => "cool",'stock' => 23]);
        $test2 = Product::factory()->create(['name' => 'failed_test','price' =>  13,'description' => 'test', 'quantity' => 1,'productCat' => 'rum', 'flavour' => 'nice', 'percentage' => 34,'image' => "cool",'stock' => 23]);
        $test3 = Product::factory()->create(['name' => 'finished_test','price' =>  13,'description' => 'test', 'quantity' => 1,'productCat' => 'rum', 'flavour' => 'nice', 'percentage' => 34,'image' => "cool",'stock' => 23]);


        $response = $this->get('/products?seach_entry=test');
        #should return all products which are similar
        $response->assertSee($test1->name);
        $response->assertSee($test2->name);
        $response->assertSee($test3->name);

        $response = $this->get('/products?search_entry=successful');
        #should only return the product which matches the query
        $response->assertDontSee($test1->name);
        $response->assertDontSee($test2->name);
        $response->assertDontSee($test3->name);
    }


}

