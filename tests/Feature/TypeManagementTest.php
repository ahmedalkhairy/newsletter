<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Type;
use App\User;

class TypeManagementTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function type_can_be_created()
    {

        $this->withoutExceptionHandling();

        $user=$this->actingAs(factory(User::class)->create());
        
        $response=$user->post('types',[
            'type' => "text2"
        ]);
        
        $response->assertSessionDoesntHaveErrors();

        $types=Type::all();
        
        $this->assertCount(1,$types);
        
        $response->assertRedirect();

    }
    /**
     * @test
     */
    public function type_validate_of_create_required()
    {
        $user=$this->actingAs(factory(User::class)->create());
     
        $response= $user->post('types',[
            'type' => ""
        ]);
     
        $response->assertRedirect();
     
        $response->assertSessionHasErrors(['type']);

    }
    /**
     * @test
     */
    public function type_validate_of_create_unique()
    {
     
        $user=$this->actingAs(factory(User::class)->create());
     
        $response=$user->post('types',[
            'type' => "text"
        ]);

        $response->assertSessionDoesntHaveErrors();
     
        $response=$user->post('types',[
            'type' => "text"
        ]);
     
        $response->assertRedirect();
     
        $response->assertSessionHasErrors(['type']);
    }

    /**
     * @test
     */

    public function type_can_be_updated()
    {
        $user=$this->actingAs(factory(User::class)->create());

        $type = factory(Type::class)->create();

        $response =$user->patch('types/'.$type->id,[
            'type'=>"text"
        ]);

        $this->assertCount(1 , Type::all());

        $this->assertEquals('text' , $type->fresh()-> type);

        $response->assertRedirect();
    }

    /**
     * @test
     */

    public function type_can_be_deleted()
    {
        
        $user=$this->actingAs(factory(User::class)->create());
        
        $type = factory(Type::class)->create();

        $response = $user->delete("types/$type->id");

        $types = Type::all();

        $this->assertCount(0,$types);

        $response->assertRedirect();

        //after delete
        $response = $user->delete("types/$type->id");

        $response->assertNotFound();
    }
}
