<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserProfileTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function a_user_can_update_his_profile()
    {
        //acting as a user a loggin user
        $userLoggin = $this->actingAs(factory(User::class)->create());

        //I want to update my profile
        $response = $userLoggin->patch('users/profile', [

            'name' => 'abdo',
            'last_name' => 'najjar',
            'picture_url' => "www.google.ps",
            'dob' => '2011-01-07',
            'email' => "abdo@abdo.com",
        ]);

        //check if it redirect to profile page to the loggin in user
        $response->assertRedirect(route('profile.show'));

        //then my profile will be updated depend on my new informitions that I submited
        $this->assertEquals('abdo', auth()->user()->name);
        $this->assertEquals('najjar', auth()->user()->last_name);
        $this->assertEquals('www.google.ps', auth()->user()->picture_url);
        $this->assertEquals('abdo@abdo.com', auth()->user()->email);
        $this->assertEquals(date('Y-m-d', strtotime("2011-01-07")), auth()->user()->dob);
    }
}
