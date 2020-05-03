<?php

namespace Tests\Unit;

use App\Component;
use App\Type;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\TestCase;

class ComponentTest extends TestCase
{

    use RefreshDatabase;
    /**
     * @test
     */
    public function FunctionName()
    {


    factory(Component::class)->create();

        $type = factory(Type::class)->create([
            'type'=>"buttons"
        ]);

        $componet = Component::create([
            'content' => "Asdasddsasad",
            'type_id' =>$type
        ]);

        $typeViaComponet = $componet->type;


        $this->assertEquals('buttons' , $typeViaComponet->type);

    }


}
