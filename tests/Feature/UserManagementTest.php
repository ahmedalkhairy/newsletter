<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;


    /**
     * @test
     */
    public function user_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $user= $user = $this->actingAs(factory(User::class)->create());

      $response=$user->patch("users/$user->id",[
       'name' => 'rahma',
       'last_name'=>'hammami',
        'role'=>'0'

      ]);
        $response->assertRedirect();
        $this->assertCount(1 , User::all());

    }


}
