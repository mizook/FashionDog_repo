<?php

namespace Tests\Unit;


use App\Models\Client;
use Tests\TestCase;

class ClientTest extends TestCase
{
    /** @test */
    public function Probar_C(): void
    {
        $usuarioBuscado = Client::where('rut', '194637128')->first();
        if ($usuarioBuscado === null) {
            $usuarioBuscado = Client::create([
                'rut' => '194637128',
                'name' => 'seba',
                'last_name' => 'huanca',
                'email' => 'sh@ucn.cl',
                'phone' => '987654321',
                'address' => 'Avenida Angamos #0610',
                'password' => '123456789'
            ]);
        }

        $response = $this->actingAs($usuarioBuscado)->get('/login');
        $response->assertRedirect('/');
    }
}
