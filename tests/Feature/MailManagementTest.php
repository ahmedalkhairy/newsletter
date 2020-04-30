<?php

namespace Tests\Feature;

use App\Mail;
use App\User;
use App\Newsletter;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MailManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     *
     * @return void
     */
    public function test_mail_can_be_created()
    {
        $newsletter = factory(Newsletter::class)->create();

        $user = $this->actingAs(factory(User::class)->create());

        $response = $user->post('mails', [
            'title' => "mail",
            'content' => "<h1>hello world!</h1>",
            'newsletter_id' => $newsletter->id,
        ]);

        $response->assertRedirect();

        $numberOfCreatedMail = 1;

        $this->assertCount($numberOfCreatedMail, Mail::all());

        $mail = Mail::first();

        $this->assertEquals('mail', $mail->title);
        $this->assertEquals('<h1>hello world!</h1>', $mail->content);
    }

    public function test_mail_can_be_deleted()
    {

        $user = $this->actingAs(factory(User::class)->create());

        $mail = factory(Mail::class)->create();

        $response = $user->delete("mails/$mail->id");

        $mails = Mail::all();

        $this->assertCount(0, $mails);

        $response->assertRedirect();

        //after delete
        $response = $user->delete("mails/$mail->id");

        $response->assertNotFound();

    }

    /**
     *
     * @return void
     */
    public function test_check_validation_if_it_work_perfectly()
    {

        $user = $this->actingAs(factory(User::class)->create());


        $response = $user->post('mails', [
            'title' => '',
            'content' => '',
            'newsletter_id' => '',
        ]);


        $response->assertSessionHasErrors(['title', 'content', 'newsletter_id']);


        $newsletter = factory(Newsletter::class)->create();


        $response = $user->post('mails', [
            'title' => 'mail',
            'content' => '<h2>adasdsa</h2>',
            'newsletter_id' => $newsletter->id,
        ]);

        $response->assertRedirect();

        $response = $user->post('mails', [
            'title' => 'mail',
            'content' => '<h2>adasdsa</h2>',
            'newsletter_id' => $newsletter->id,
        ]);

        $response->assertSessionHasErrors('title');

        $newsletterIdDoseNotExists = 1999;

        $response = $user->post('mails', [
            'title' => 'mail',
            'content' => '<h2>adasdsa</h2>',
            'newsletter_id' => $newsletterIdDoseNotExists,
        ]);

        $response->assertSessionHasErrors(['newsletter_id']);
    }


    /**
     * @test
     */
    public function mail_can_be_updated()
    {

        $user = $this->actingAs(factory(User::class)->create());

        $this->withoutExceptionHandling();

        $newsletterId = factory(Newsletter::class)->create()->id;

        $response = $user->post('mails' , [
            'title' => 'mail',
            'content' => 'rahma',
            'newsletter_id'=>$newsletterId
        ]);

        $response->assertRedirect();

        $mail = Mail::first();

        $response = $user->patch("mails/$mail->id", [
            'title' => 'mail_1',
            'content' => 'content_test',
            'newsletter_id'=>$newsletterId
        ]);

        $this->assertEquals('mail_1', $mail->fresh()->title);
        $this->assertEquals('content_test', $mail->fresh()->content);
        $response->assertRedirect();
    }

    /**
     * @test
     */
    public function validation_update_for_required_roles()
    {

        $user = $this->actingAs(factory(User::class)->create());

        //update for title and content required
        $mail = factory(Mail::class)->create([
            'title' => 'mail_1',
            'content' => 'content_test'
        ]);

        $response = $user->patch("mails/$mail->id", [
            'title' => '',
            'content' => '',
            'newsletter_id' => ''

        ]);

        $response->assertSessionHasErrors(['title', 'content', 'newsletter_id']);
    }

    /**
     * @test
     */
    public function  validation_update_for_title_is_unique()
    {

        $user = $this->actingAs(factory(User::class)->create());

        $newsletterId = factory(Newsletter::class)->create()->id;

        $user->post('mails', [
            'title' => 'mail',
            'content' => "content",
            'newsletter_id' => $newsletterId
        ]);

        $mail = Mail::first();

        $user->post('mails', [
            'title' => 'mails_1',
            'content' => "content",
            'newsletter_id' => $newsletterId
        ]);

      

        $response = $user->patch("mails/$mail->id", [
            'title' => 'mails_1',
            'content' => "content",
            'newsletter_id' => $newsletterId
        ]);

        $response->assertSessionHasErrors(['title']);
    }


     /**
     * @test
     */
    public function  validation_update_for_title_is_unique_for_the_another_raws()
    {

        $user = $this->actingAs(factory(User::class)->create());

        $newsletterId = factory(Newsletter::class)->create()->id;

        $user->post('mails', [
            'title' => 'mail',
            'content' => "content",
            'newsletter_id' => $newsletterId
        ]);

        $mail = Mail::first();

        $response = $user->patch("mails/$mail->id", [
            'title' => 'mail',
            'content' => "content_2",
            'newsletter_id' => $newsletterId
        ]);

        $response->assertSessionHasNoErrors();
    }

    /**
     * @test
     */
    public function  validation_update_for_newsletter_id_is_exists()
    {

        $user = $this->actingAs(factory(User::class)->create());

        $newsletterId = factory(Newsletter::class)->create()->id;

        $user->post('mails', [
            'title' => 'mail',
            'content' => "content",
            'newsletter_id' => $newsletterId
        ]);

        $mail = Mail::first();

        $newsletterDoseNotExists = 1999;

        $response = $user->patch("mails/$mail->id", [
            'title' => 'mail',
            'content' => "content",
            'newsletter_id' => $newsletterDoseNotExists
        ]);


        $response->assertSessionHasErrors(['newsletter_id']);
    }
}
