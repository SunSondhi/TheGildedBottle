<?php

namespace Tests\Feature;


namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use App\Models\Baskets;
use App\Models\Basket_product;
use Illuminate\Database\Eloquent\Factories\Factory;

class loginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    #test whether account made when condition are met for field entry
    public function test_right_register()
    {

       $response = $this->post('/register', [
        'name' => 'Test',
        'email' => 'this_is_a_test@gmail.com',
        'password' => 'Test2234',
        'password_confirmation' => 'Test2234',
       ]);

       $response->assertRedirect('/home'); # should direct user to home page with created account
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

    #test whether user can make an account when passwords fields dont match
    public function test_passfail_register()
    {

       $response = $this->post('/register', [
        'name' => 'Test',
        'email' => 'this_is_a_test@gmail.com',
        'password' => 'test',
        'password_confirmation' => 'podsfa',
       ]);

       $response->assertRedirect('/'); #should keep user on page and not make an account
    }
}
