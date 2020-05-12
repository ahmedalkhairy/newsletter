<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $guarded = [];

    public function path()
    {
        return route('components.show', ['component' => $this->id]);
    }


    public function input_type()
    {

        return $this->belongsTo(Type::class,'type_id','id');
    }
}
