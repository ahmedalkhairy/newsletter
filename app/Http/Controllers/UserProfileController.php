<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfile\ValidateRequest;

class UserProfileController extends Controller
{

    public function update(ValidateRequest $validateRequest)
    {
        $validateRequest->date =  date('Y - m - d', $validateRequest->date);

        auth()->user()->update($validateRequest->all());
        
        return redirect()->route('profile.show');
    }

    public function show()
    {

    }

    public function edit()
    {

    }
}
