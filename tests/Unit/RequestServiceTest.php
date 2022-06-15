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
use App\Models\Request as RequestModel;
use App\Models\ClientRequest;

class RequestServiceTest extends TestCase
{
    /** @test*/
    public function test_client_can_request_service()
    {
        $newClient = Client::create([
            'rut' => '191120052',
            'name' => 'Pedro',
            'last_name' => 'Sanchez',
            'email' => 'PedroSanchez@gmail.com',
            'address' => 'Avenida Petronila #974',
            'phone' => '973332265',
            'password' => '1234567890'
        ]);

        $newRequest = array('input_date' => "2099-01-01", 'input_time' => "00:00:00");
        $this->actingAs($newClient, 'client')->get('/login');

        $this->json('POST', route('add.request.post', ['rut' => '191120052']), $newRequest)->assertRedirect('/cliente');

        Client::where('rut', '191120052')->first()->delete();
        ClientRequest::where('client_rut', '191120052')->first()->delete();
        RequestModel::where('date', '2099-01-01 00:00:00')->first()->delete();
    }
}
