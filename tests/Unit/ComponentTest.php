<?php

namespace Tests\Unit;

use App\Component;
use App\Type;
use PHPUnit\Framework\TestCase;

class ComponentTest extends TestCase
{
    
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
