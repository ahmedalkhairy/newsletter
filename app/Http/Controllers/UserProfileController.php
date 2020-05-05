<?php

namespace App\Http\Controllers;
use App\user;

use App\Http\Requests\UserProfile\ValidateRequest;

class UserProfileController extends Controller
{

    public function update(ValidateRequest $validateRequest, User $user)
    {
        $validateRequest->date =  date('Y - m - d', $validateRequest->date);

        auth()->user()->update($validateRequest->all());

        if($validateRequest->hasFile('picture_url')){
            $fileWithExt=$validateRequest->file('picture_url')->getClientOriginalName();
            $fileWithoutExt=pathinfo($fileWithExt,PATHINFO_FILENAME);
            $fileExt=$validateRequest->file('picture_url')->getClientOriginalExtension();
            $fileNewName=$fileWithoutExt.'_'.time().'.'.$fileExt;
            $path=$validateRequest->file('picture_url')->storeAs('app/public/imgs',$fileNewName);
            // Storage::delete('public/imgs/'.$data->imgx);
            $user->picture_url=$fileNewName;
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
