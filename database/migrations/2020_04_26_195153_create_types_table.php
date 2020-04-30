<?php

use App\Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->timestamps();
        });


        //put your types values here to insert to the database
        $types = [
            [
                'type' => 'buttons'
            ],
            [
                'type' => 'images'
            ],
            [
                'type' => 'texts'
            ],
            [
                'type' => 'titles'
            ],
            [
                'type' => 'icons'
            ]

        ];

        foreach ($types as $type) {
            //create the static types without crud
            Type::create($type);
        }
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
