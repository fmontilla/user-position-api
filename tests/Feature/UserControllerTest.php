<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Arr;
use Laravel\Lumen\Testing\DatabaseMigrations;
use TestCase;

class UserControllerTest extends TestCase
{
    use DatabaseMigrations;

    CONST CREATE_USER_URI = '/api/user';

    /** @test */
    public function create_user()
    {
        $user = User::factory()->make();

        $this->json('POST', self::CREATE_USER_URI, $user->toArray());
        $json = json_decode($this->response->content(), true);

        $this->assertResponseOk();
        $this->seeJsonStructure([
            'name',
            'email',
            'updated_at',
            'created_at',
            'id'
        ]);
        $this->assertEquals($user->name, Arr::get($json, 'name'));
        $this->assertEquals($user->email, Arr::get($json, 'email'));
    }

}
