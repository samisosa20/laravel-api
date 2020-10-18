<?php

namespace Tests\Unit;

use App\Models\City;
use Tests\TestCase;

class ApiCityTest extends TestCase
{
    private $_id = 0;
    
    /**
     * test_can_show_city - test if can show a city with id.
     *
     * @return void
     */
    public function test_can_show_city()
    {

        $data = [
            'data' => [
                'id' => 10839,
                "Paises_Codigo" => "CO",
                "Ciudad" => "Medellín"
            ]
        ];

        $this->get(route('showcity', ['id' => 10839]))
            ->assertStatus(200)
            ->assertJsonFragment($data['data']);
    }

    /**
     * test_can_create_city - test if can create a city.
     *
     * @return void
     */
    public function test_can_create_city()
    {
        $data = [
            'data' => [
                'type' => 'activity cities',
                'message' => 'Success'
            ]
        ];

        $data_request = [
            "Paises_Codigo" => "CO",
            "Ciudad" => "Ensayo"
        ];
        
        $response = $this->post(route('createcity', $data_request))
        ->assertStatus(201)
        ->assertJsonFragment($data['data']);
        $this->_id = $response["data"]["id"];
        $this->test_can_update_city();
        $this->test_can_delete_city();
    }

    /**
     * test_can_update_city - test if can update a city with id.
     *
     * @return void
     */
    private function test_can_update_city()
    {

        $data = [
            'data' => [
                'type' => 'cities',
                'message' => 'Update Success'
            ]
        ];

        $data_request = [
            "Paises_Codigo" => "CO",
            "Ciudad" => "Ensayo_update"
        ];

        $this->put(route('updatecity', ['id' => $this->_id]), $data_request)
            ->assertStatus(201)
            ->assertJson($data);
        
    }

    /**
     * test_can_delete_city - test if can delete a city with id.
     *
     * @return void
    */
    private function test_can_delete_city()
    {

        $this->delete(route('deletecity', ['id' => $this->_id]))
            ->assertStatus(204);
        
    } 
}
