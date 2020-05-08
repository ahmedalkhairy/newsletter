<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{

    const SUBSCRIBE = '1';
    const UNSUBSCRIBE = '0';

    const ADMIN_ROLE = '1';
    const CLINET_ROLE = '0';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';

    protected $fillable = [

        'name', 'email', 'password', 'role', 'last_name', 'picture_url', 'dob',

    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $attributes = [

        //set default value for role as aclient
        'role' => User::CLINET_ROLE,
    ];


    public function isAdmin()
    {
        return $this->role == User::ADMIN_ROLE;
    }


    public function isClient()
    {
        return $this->role == User::CLINET_ROLE;
    }

    public function newsletters()
    {
        return $this->belongsToMany(Newsletter::class)->withPivot(['inscription'])->withTimestamps();
    }


    public function subscription($newsletterId, $subscribeValue)
    {

        $this->newsletters()->syncWithoutDetaching([

            $newsletterId => [

                'inscription' => $subscribeValue
            ]

        ]);
    }

    public function isSubscribe($newsletterId)
    {
        return DB::table('newsletter_user')
            ->select(['id'])
            ->where('user_id', $this->id)
            ->where('newsletter_id', $newsletterId)
            ->where('inscription', User::SUBSCRIBE)
            ->get()
            ->isNotEmpty();
    }
}
