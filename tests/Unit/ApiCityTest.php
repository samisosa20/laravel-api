<?php

namespace Tests\Unit;

use App\Models\City;
use Tests\TestCase;

class ApiCityTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_show_city() {

        $data = [
            'id' => 10839,
            "Paises_Codigo" => "CO",
            "Ciudad" => "Medellín",
            "created_at" => null,
            "updated_at" => null
        ];

        $this->get(route('showcity', $data))
            ->assertStatus(200)
            ->assertJson($data);
    }
}
