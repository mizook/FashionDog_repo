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
    public function test_admin_can_login()
    {
        // Usamos los datos del administrador Antonio para realizar el test
        $adminFounded = Administrator::where('rut', '17977139K')->first();
        if ($adminFounded == null) return false;

        $credentials = ['rutLogin' => '17977139K', 'passwordLogin' => 'fashionDog'];

        $this->json('POST', route('login'), $credentials)
            ->assertRedirect('/admin');
    }
    /*@test*/
    public function test_client_can_login()
    {
        Client::create([
            'rut' => '191120052',
            'name' => 'Pedro',
            'last_name' => 'Sanchez',
            'email' => 'PedroSanchez@gmail.com',
            'address' => 'Avenida Petronila #974',
            'phone' => '973332265',
            'password' => '1234567890'
        ]);

        $credentials = [
            'rutLogin' => "191120052",
            'passwordLogin' => "1234567890"
        ];

        $this->json('POST', route('login'), $credentials)
            ->assertRedirect('/cliente');

        Client::where('rut', '191120052')->first()->delete();
    }

    /*@test*/
    public function test_stylist_can_login()
    {
        Stylist::create([
            'rut' => '209117645',
            'password' => '1234567890',
            'name' => 'Rigoberto',
            'last_name' => 'Mora',
            'email' => 'RigobertoMora@gmail.com',
            'phone' => '917772467'
        ]);

        $credentials = [
            'rutLogin' => "209117645",
            'passwordLogin' => "1234567890"
        ];

        $this->json('POST', route('login'), $credentials)
            ->assertRedirect('/estilista');

        Stylist::where('rut', '209117645')->first()->delete();
    }
}
