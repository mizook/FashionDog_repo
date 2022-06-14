<?php

//namespace Tests\Unit;

namespace Tests;

use Illuminate\Http\Request;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use App\Models\Operator;
use Illuminate\Foundation\Testing\WithFaker;


//use PHPUnit\Framework\TestCase;
use App\Models\Administrator;
use App\Models\Client;
use App\Models\Stylist;

class RegisterControllerTest extends TestCase
{
    /** @test*/
    public function test_client_registered()
    {

        $clientFounded = Client::where('rut', '90868632')->first();
        if ($clientFounded === null) {
        }
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
        $clientFounded = Client::where('rut', '90868632')->first();
        if ($clientFounded != null) {

            $credenciales = [
                'rutLogin' => "90868632",
                'passwordLogin' => "1234567890"
            ];

            $this->json('POST', route('login'), $credenciales)
                ->assertRedirect('/cliente');
        } else {

            $this->json('POST', route('register'), $newClient)
                ->assertRedirect('/cliente');
        }
    }

    /** @test*/
    public function add_request()
    {

        $credenciales = [
            'rutLogin' => "90868632",
            'passwordLogin' => "1234567890"
        ];

        $newrequest = array('input_date' => "2024-04-02", 'input_time' => " 00:00:00");


        $this->json('POST', route('login'), $credenciales)
            ->assertRedirect('/cliente');




        $this->json('POST', route('add.request.post', ['rut' => '90868632']), $newrequest)->assertRedirect('/cliente');
    }
}
