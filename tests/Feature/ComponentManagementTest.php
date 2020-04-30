<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Component;
use App\Type;
use App\User;

class ComponentManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     *  as a loggin user I can create component
     * @test
     */
    public function auth_user_could_create_component()
    {
        //create loggin user
        $user = $this->actingAs(factory(User::class)->create());

        //create type to get the id if the type
        $type = factory(Type::class)->create();

        //send post request to create new component
        $response = $user->post(route('components.store'), [

            'type_id' => $type->id,

            'content' => "Abdo and rahama are best friends!",

        ]);


        $componentId = 1;

        //assert redirect to the component page
        $response->assertRedirect(route('components.show' , ['component'=>$componentId]));

        $this->assertCount(1, Component::all());
    }

    /**
     * @test
     */
    public function auth_user_could_update_component()
    {
        //create loggin user
        $user = $this->actingAs(factory(User::class)->create());

        $component = factory(Component::class)->create([

            'content' => "Abdo and rahama are best friends!",

        ]);

        $typeId = factory(Type::class)->create()->id;

        $response = $user->patch("components/$component->id", [

            'type_id' => $typeId,

            'content' => " best friends!",
        ]);
        $this->assertEquals('best friends!', $component->fresh()->content);


        //assert redirect to the component page
        $response->assertRedirect(route('components.show' , ['component'=>$component->id]));

    }


    /**
     * @test
     *
     * @return void
     */
    public function auth_user_could_delete_component()
    {

        //create loggin user
        $user = $this->actingAs(factory(User::class)->create());

        //create component for test delete method
        $component = factory(Component::class)->create();

        //send the delete request to delete component
        $response = $user->delete(route('components.destroy', ['component' => $component->id]));

        //check after the request send it would be redirect to the index page of the component
        $response->assertRedirect(route('components.index'));

        //check if the request delete the facker component from database
        $this->assertCount(0, Component::all());
    }

    /**
     * @test
     */
    public function validation_update_for_required()
    {
        //create loggin user
        $user = $this->actingAs(factory(User::class)->create());

        $component = factory(Component::class)->create();

        $response = $user->patch("components/$component->id", [

            'type_id' => "",

            'content' => "",
        ]);


        $response->assertSessionHasErrors(['type_id', 'content']);
    }

    /**
     * @test
     */
    public function validation_update_for_unique_content()
    {

        //test for insure the content unique in update

        $user = $this->actingAs(factory(User::class)->create());

        $component_1 = factory(Component::class)->create([

            'content' => 'test of content'
        ]);

        factory(Component::class)->create([

            'content' => 'content_test'
        ]);

        $typeId = factory(Type::class)->create()->id;

        $response = $user->patch("components/$component_1->id", [

            'type_id' => $typeId,

            'content' => "content_test",
        ]);

        $response->assertSessionHasErrors(['content']);
    }

    /**
     * @test
     */
    public function validation_create_for_unique_content()
    {

        $user = $this->actingAs(factory(User::class)->create());

        factory(Component::class)->create([

            'content' => 'test of content'
        ]);

        $typeId = factory(Type::class)->create()->id;

        $response = $user->post(route('components.store'), [
            'type_id' => $typeId,
            'content' => 'test of content'
        ]);


        $response->assertSessionHasErrors(['content']);
    }

    /**
     * @test
     */
    public function check_the_validation_of_type_id_on_create_and_update()
    {

        //check if the type_id is valid on create
        $user = $this->actingAs(factory(User::class)->create());

        $response = $user->post(route('components.store'), [
            'type_id' => 1997,
            'content' => 'test of content'
        ]);

        $response->assertSessionHasErrors(['type_id']);

        $type = factory(Type::class)->create();

        $component = factory(Component::class)->create([
            'type_id' => $type->id
        ]);

        $response = $user->patch(route('components.update', ['component' => $component]), [

            'type_id' => 1000,

            'content' => $component->content

        ]);

        $response->assertSessionHasErrors(['type_id']);
    }

    /**
     * @test
     */
    public function check_the_validation_of_content_on_update_and_leave_type_Id()
    {
        $user = $this->actingAs(factory(User::class)->create());

        $typeId = factory(Type::class)->create()->id;

        $component = factory(Component::class)->create([
            'type_id' => $typeId,

            'content' => 'test of content'
        ]);

        $response = $user->patch(route('components.update', ['component' => $component]), [

            'type_id' => $typeId,

            'content' => 'test_content'
        ]);

        $response->assertSessionDoesntHaveErrors();
    }
}
