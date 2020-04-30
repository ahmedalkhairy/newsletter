<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
    protected $guarded = [];

    public function path()
    {
        return route('mails.show' , ['mail'=>$this->id]);
    }

    public function newsletter()
    {
        return $this->belongsTo(Newsletter::class);
    }

}
