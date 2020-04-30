<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\User;
use App\Newsletter;

class NewsletterManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_newsletter_can_be_created()
    {
        $user = $this->actingAs(factory(User::class)->create());
        
        $response = $user->post('newsletters', [
            'name' => "News",
            'description' => "adsadsadsadadsdas",
        ]);

        $response->assertRedirect();

        $this->assertCount(1, Newsletter::all());

        $this->assertEquals('News', NewsLetter::first()->name);

        $this->assertEquals('adsadsadsadadsdas', NewsLetter::first()->description);

        $this->assertEquals('Active', NewsLetter::first()->active);
    }

    /**
     *  @test
     *
     * @return void
     */
    public function news_letter_validation()
    {


        //for test valdation in store method
        $user = $this->actingAs(factory(User::class)->create());
        $response = $user->post('newsletters', [
            'name' => "",
            'description' => "",
        ]);

        $response->assertSessionHasErrors(['name', 'description']);


        //successfully created
        factory(Newsletter::class)->create([
            'name'=>'News'
        ]);


        $response = $user->post('newsletters', [
            'name' => "News",
            'description' => "adsadsadsadadsdas",
        ]);


        $response->assertSessionHasErrors(['name']);



        //for test update validation method

        //create new newsletter
        $newsletter = factory(Newsletter::class)->create();

        $response->assertRedirect();

        $newsletter = Newsletter::first();


        $response = $user->patch('newsletters/' . $newsletter->id, [
            'name' => "college",
            'description' => "asd asd asd asd asd asd asd as asdas ",
            "active" => '1'
        ]);


        $response->assertSessionHasNoErrors();
    }

    /**
     * @test
     *
     * @return void
     */
    public function  a_newsletter_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $user = $this->actingAs(factory(User::class)->create());

        $newsletter = factory(Newsletter::class)->create();

        $response = $user->patch("newsletters/$newsletter->id", [

            'name' => 'abdo',
            'description' => 'osamaosamaosamaosama',
            'active' => 1,

        ]);


        $response->assertRedirect();

        $this->assertCount(1 , Newsletter::all());

        $this->assertEquals('abdo' , $newsletter->fresh()->name);

        $this->assertEquals('osamaosamaosamaosama' , $newsletter->fresh()->description);

        $this->assertEquals('Active' , $newsletter->fresh()->active);

        $response->assertRedirect();

    }


    /**
     * @test
     */
    public function acive_and_inactive_newsletter()
    {

        $user = $this->actingAs(factory(User::class)->create());


        $newsletter = factory(Newsletter::class)->create([

            'active' =>'0'
        ]);


        //change the status of the newsletter to active
        $response =  $user->patch(route('newsletters.changeStatus',['newsletter'=>$newsletter->id]) , [

            'active'=>'1'

        ]);

        $response->assertSessionDoesntHaveErrors();

        $this->assertEquals('1' , $newsletter->fresh()->getOriginal('active'));


        //change the status of the newsletter to inactive
        $response =  $user->patch(route('newsletters.changeStatus',['newsletter'=>$newsletter->id]));
        
        $response->assertSessionDoesntHaveErrors();

        $this->assertEquals('0' , $newsletter->fresh()->getOriginal('active'));
    
    }


    // /**
    //  *
    //  * @test
    //  */
    // public function acive_and_inactive_newsletter_validation()
    // {

    //     $user = $this->actingAs(factory(User::class)->create());


    //     $newsletter = factory(Newsletter::class)->create([

    //         'active' =>'0'
    //     ]);


    //     //check if the validation pass in case the active is 1
    //     $response =  $user->patch(route('newsletters.changeStatus',['newsletter'=>$newsletter->id]) , [

    //         'active'=>'1'

    //     ]);

    //     $response->assertSessionDoesntHaveErrors();


    //     //check if the validation pass in case the active is 0
    //     $response =  $user->patch(route('newsletters.changeStatus',['newsletter'=>$newsletter->id]) , [

    //         'active'=>'0'

    //     ]);

    //     $response->assertSessionDoesntHaveErrors();
        

    //     //check if the vaidation will falid in case the active is empty
    //     $response =  $user->patch(route('newsletters.changeStatus',['newsletter'=>$newsletter->id]) , [

    //         'active'=>''

    //     ]);

    //     $response->assertSessionHasErrors(['active']);



    //     //check if the vaidation will falid in case the active is not numeric
    //     $response =  $user->patch(route('newsletters.changeStatus',['newsletter'=>$newsletter->id]) , [

    //         'active'=>'asdasdsad'

    //     ]);

    //     $response->assertSessionHasErrors(['active']);




    //     //check if the vaidation will falid in case the active is larger that 1
    //     $response =  $user->patch(route('newsletters.changeStatus',['newsletter'=>$newsletter->id]) , [

    //         'active'=>'9'

    //     ]);

    //     $response->assertSessionHasErrors(['active']);




    //     //check if the vaidation will falid in case the active is smaller that 0
    //     $response =  $user->patch(route('newsletters.changeStatus',['newsletter'=>$newsletter->id]) , [

    //         'active'=>'-1'

    //     ]);

    //     $response->assertSessionHasErrors(['active']);

    // }
}
