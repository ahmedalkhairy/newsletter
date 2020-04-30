<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $guarded = [];

    /**
     *
     * @return void
     */
    public function path()
    {
        return route('newsletters.show', ['newsletter' => $this->id]);
    }


    public function getActiveAttribute($attribute)
    {
        return [
            '0'=>"Inactive",
            '1'=>"Active"
        ][$attribute];

    }


    public function mails()
    {
        return $this->hasMany(Mail::class);
    }
}
