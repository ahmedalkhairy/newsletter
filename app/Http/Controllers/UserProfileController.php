<?php

namespace App\Http\Controllers;
use App\user;

use App\Http\Requests\UserProfile\ValidateRequest;

class UserProfileController extends Controller
{

    public function update(ValidateRequest $validateRequest)
    {
        $validateRequest->date =  date('Y - m - d', $validateRequest->date);

        auth()->user()->update($validateRequest->all());
        
        $this->flashUpdatedSuccessfully();
        
        return redirect()->route('profile.show');
    }

    public function show(User $user)
    {
        $title = "Mon profil";

        return view('profile.show',compact('user'));
    }

    public function edit(User $user)
    {
        $title = "Modifier mon profil ";

        return view('profile.edit', compact('user', 'title'));
    }
}
