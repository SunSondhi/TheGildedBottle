<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function search_test()
    {
        $response = $this->get('/products?search_entry=');

        $response->assertStatus(200);
        $response->assertDontSee(__(key:'no products found'));
    }

    public function search_test()
    {
        $response = $this->get('/products?search_entry=');

        $response->assertStatus(200);
        $response->assertDontSee(__(key:'no products found'))
    }
}
