<?php

namespace Tests\Feature;

use App\Models\Position;
use Illuminate\Support\Arr;
use Laravel\Lumen\Testing\DatabaseMigrations;
use TestCase;

class PositionControllerTest extends TestCase
{
    use DatabaseMigrations;

    CONST CREATE_POSITION_URI = '/api/position';
    CONST USER_POSITION_URI = '/api/position/user/';

    /** @test */
    public function create_position()
    {
        $position = Position::factory()->make();

        $this->json('POST', self::CREATE_POSITION_URI, $position->toArray());
        $json = json_decode($this->response->content(), true);

        $this->assertResponseOk();
        $this->seeJsonStructure([
            'latitude',
            'longitude',
            'user_id',
            'updated_at',
            'created_at',
            'id'
        ]);
        $this->assertEquals($position->latitude, Arr::get($json, 'latitude'));
        $this->assertEquals($position->longitude, Arr::get($json, 'longitude'));
        $this->assertEquals($position->user_id, Arr::get($json, 'user_id'));
    }

    /** @test */
    public function get_user_position()
    {
        $position = Position::factory()->create();

        $this->json('GET', self::USER_POSITION_URI.$position->user_id, []);

        $this->assertResponseOk();
        $this->seeJsonStructure([
            [
                'latitude',
                'longitude',
                'user_id',
                'updated_at',
                'created_at',
                'id'
            ]
        ]);
    }
}
