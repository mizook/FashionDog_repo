<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Administrator;
use App\Models\Client;
use App\Models\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;
use Illuminate\Foundation\Testing\RefreshDatabase;

use function PHPUnit\Framework\assertEquals;

class HomePageTest extends TestCase
{

    /** @test */
    public function test_load_home_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
