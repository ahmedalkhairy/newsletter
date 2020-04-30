<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = [];

    public function path()
    {
        return route('types.show' , ['type'=>$this->id]);
    }

    
    public function components()
    {

        return $this->hasMany(Component::class);       
    }


}
