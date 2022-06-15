<?php

//namespace Tests\Unit;

namespace Tests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\Operator;
use Illuminate\Foundation\Testing\WithFaker;


//use PHPUnit\Framework\TestCase;
use App\Models\Client;


class RegisterControllerTest extends TestCase
{
    /** @test*/
    public function test_can_register_client()
    {
        $newClient = array(
            'rut' => '90868632',
            'name' => 'Cliente',
            'last_name' => 'Prueba',
            'email' => 'ClientePrueba@gmail.com',
            'address' => 'Avenida Esmeralda',
            'phone' => '976662743',
            'password' => '1234567890',
            'password_confirmation' => '1234567890'
        );

        $this->json('POST', route('register'), $newClient)
            ->assertRedirect('/cliente');

        Client::where('rut', '90868632')->first()->delete();
    }
}
