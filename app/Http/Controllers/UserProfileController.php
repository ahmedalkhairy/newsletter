<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfile\ValidateRequest;
use App\User;
use Illuminate\Support\Facades\File;

class UserProfileController extends Controller
{

    public function update(ValidateRequest $validateRequest)
    {   


        auth()->user()->update($validateRequest->except('picture_url'));


        if($validateRequest->hasFile('picture_url')){

            auth()->user()->update([
                'picture_url' => $validateRequest->file('picture_url')->store('images' , 'public')
            ]);

        }
      
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
