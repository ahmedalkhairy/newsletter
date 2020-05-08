<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    protected $guarded = [];


    const ACTIVE = '1';
    const INACTIVE = '0';

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
            '0' => "Inactive",
            '1' => "Active"
        ][$attribute];
    }


    public function mails()
    {
        return $this->hasMany(Mail::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot(['inscription']);
    }
}
