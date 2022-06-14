<?php

//namespace Tests\Unit;

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\Operator;
use Illuminate\Foundation\Testing\WithFaker;


//use PHPUnit\Framework\TestCase;
use App\Models\Administrator;
use App\Models\Client;
use App\Models\Stylist;

class LoginControllerTest extends TestCase
{
    /*@test*/
    public function test_admin_logged_in()
    {
        $adminFounded = Administrator::where('rut', '179771393')->first();
        if ($adminFounded === null) {
            $adminFounded = Administrator::create([
                'rut' => '179771393',
                'password' => '1234567890'
            ]);
        }

        $response = $this->actingAs($adminFounded)->get('/login')->assertRedirect('/');
    }

    /*@test*/
    public function test_client_logged_in()
    {
        $clientFounded = Client::where('rut', '191120052')->first();
        if ($clientFounded === null) {
            $clientFounded = Client::create([
                'rut' => '191120052',
                'name' => 'Pedro',
                'last_name' => 'Sanchez',
                'email' => 'PedroSanchez@gmail.com',
                'address' => 'Avenida Petronila #974',
                'phone' => '973332265',
                'password' => '1234567890'
            ]);
        }
        $response = $this->actingAs($clientFounded)->get('/login')->assertRedirect('/');
    }

    /*@test*/
    public function test_stylist_logged_in()
    {
        $stylistFounded = Stylist::where('rut', '209117645')->first();
        if ($stylistFounded === null) {
            $stylistFounded = Stylist::create([
                'rut' => '209117645',
                'password' => '1234567890',
                'name' => 'Rigoberto',
                'last_name' => 'Mora',
                'email' => 'RigobertoMora@gmail.com',
                'phone' => '917772467'
            ]);
        }
        $response = $this->actingAs($stylistFounded)->get('/login')->assertRedirect('/');
    }
}
