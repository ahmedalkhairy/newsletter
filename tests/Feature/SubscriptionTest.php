<?php

namespace Tests\Feature;

use App\Newsletter;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;



class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */

    public function user_can_subscribe_on_newsletter()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create([

            'role' => User::CLINET_ROLE

        ]);

        $userRequest = $this->actingAs($user);

        $newsletter = factory(Newsletter::class)->create();

        $response = $userRequest->put(route("subscribe",['newsletter' => $newsletter->id]));

        $response->assertOk();

        $response->assertJson(['message' => 'success!']);

        $numberOfSubscribtion = 1;

       $this->assertCount($numberOfSubscribtion ,$user->newsletters);

       $this->assertEquals(User::SUBSCRIBE , $user->newsletters->first()->pivot->inscription);

    }

    /**
     * @test
     */

    public function user_can_unsubscribe_on_newsletter()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create([

            'role' => User::CLINET_ROLE

        ]);

        $userRequest = $this->actingAs($user);

        $newsletter = factory(Newsletter::class)->create();

        $response = $userRequest->put(route("subscribe",['newsletter' => $newsletter->id]));

        $response->assertOk();

        $response = $userRequest->put(route("unsubscribe",['newsletter' => $newsletter->id]));

        $response->assertOk();

        $response->assertJson(['message' => 'success!']);

        $numberOfUnsubscribtion = 1;


        $this->assertCount( $numberOfUnsubscribtion ,$user->newsletters);

        $this->assertEquals(User::UNSUBSCRIBE , $user->newsletters->first()->pivot->inscription);



    }
}
