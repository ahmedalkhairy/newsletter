<?php

namespace Tests\Unit;

use App\Newsletter;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

 class UserNewsletterRelations extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
     public function a_user_can_subscribe_a_newsletter()
    {

        //user instence
        $user = factory(User::class)->create();

        //newsletter instence
        $newsletter = factory(Newsletter::class)->create();

        $expectedResult = 1;

        //user subscribe newsletter
        $user->subscription($newsletter->id , $expectedResult);

        //check if the subscribtion dose successfully
        $this->assertCount($expectedResult, $user->newsletters);

        //check if the inscription value is 1 (subscribe)
        $this->assertEquals($expectedResult, $user->newsletters->first()->pivot->inscription);
    }



    /**
     * @test
     */
    public function a_user_can_unsubscribe_a_newsletter()
    {
        //user instence
        $user = factory(User::class)->create();

        //newsletter instence
        $newsletter = factory(Newsletter::class)->create();

        //relate user with newsletter with inscription is 1
        $user->newsletters()->sync(
            [
                $newsletter->id => [

                    'inscription' => User::SUBSCRIBE

                ]
            ]
        );

        $expectedResultForInscription = User::UNSUBSCRIBE;

        $user->subscription($newsletter->id ,$expectedResultForInscription);

        $expectedResultForCollection = 1;

        //check if the subscribtion dose successfully
        $this->assertCount($expectedResultForCollection, $user->newsletters);

        //check if the inscription value is 1 (subscribe)
        $this->assertEquals($expectedResultForInscription, $user->newsletters->first()->pivot->inscription);
    }
}
