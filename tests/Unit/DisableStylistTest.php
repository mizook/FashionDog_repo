<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Administrator;
use App\Models\Stylist;
use App\Models\Client;
use App\Models\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function PHPUnit\Framework\assertEquals;

class DisableStylistTest extends TestCase
{

    /** @test */
    public function test_can_disable_stylist()
    {
        $admin = Administrator::where('rut', '17977139K')->first();

        Stylist::create([
            'rut' => '209117645',
            'password' => '1234567890',
            'name' => 'Rigoberto',
            'last_name' => 'Mora',
            'email' => 'RigobertoMora@gmail.com',
            'phone' => '917772467'
        ]);

        $this->actingAs($admin, 'administrator')->get('/login');
        $this->json('POST', route('changeStatus.stylist', ['rut' => '209117645']))->assertRedirect('/admin/estilistas');

        Stylist::where('rut', '209117645')->first()->delete();
    }
}
