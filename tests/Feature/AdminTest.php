<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Administrator;

class AdminTest extends TestCase
{

    /** @test */
    public function addAdmi()
    {
        $AdmiBuscado = Administrator::where('rut', '179771393')->first();
        if ($AdmiBuscado === null) {
            $AdmiBuscado = Administrator::create([
                'rut' => '179771393',
                'password' => 'antonio123'
            ]);
        }

        $response = $this->actingAs($AdmiBuscado)->get('/login');
        $response->assertRedirect('/');
    }

}
