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

class AdminDesTest extends TestCase
{

    /** @test */
    public function disable_user(): void
    {

        $adminFounded = Administrator::where('rut', '179771393')->first();
        if ($adminFounded === null) {
            $adminFounded = Administrator::create([
                'rut' => '179771393',
                'password' => '1234567890'
            ]);
        }

        $stylistFounded = Stylist::where('rut', '4181356-3')->first();
        if ($stylistFounded === null) {
            $stylistFounded = Stylist::create([
                'rut' => '41813563',
                'password' => '1234567890',
                'name' => 'Riquelme',
                'last_name' => 'Mora',
                'email' => 'RigobertoMo@gmail.com',
                'phone' => '917772467'
            ]);
        }
        $credenciales = [
            'userRut' => '41813563'
        ];

        $this->json('POST', route('changeStatus.stylist', ['rut' => '41813563']),  $credenciales)->assertRedirect('/cliente');
    }
}
