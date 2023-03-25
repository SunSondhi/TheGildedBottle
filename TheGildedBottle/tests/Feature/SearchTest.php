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
   
    
    public function search_test()
    {
        $response = $this->get('/products?search_entry=');

        
        $response->assertDontSee(__(key:'no products found'));
    }

    public function search_test_see()
    {
        $response = $this->get('/products?search_entry=item_not_in_database');

        $response->assertSee(__(key:'no products found'));
    }


    public function search_test_dont_see()
    {
        $response = $this->get('/products?search_entry=test');

        $response->assertDontSee(__(key:'no products found'));
    }
    public function a_user_can_search_for_tests()
    {
        $test1 = Product::factory()->create(['name' => 'sucessful_test']);
        $test2 = Product::factory()->create(['name' => 'failed_test']);
        $test3 = Product::factory()->create(['name' => 'finished_test']);

        $response = $this->get('/search?q=test');

        $response->assertSee($test1->name);
        $response->assertSee($test2->name);
        $response->assertSee($test3->name);

        $response = $this->get('/search?q=successful');

        $response->assertSee($test1->name);
        $response->assertDontSee($test2->name);
        $response->assertDontSee($test3->name);
    }


}

