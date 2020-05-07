<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Newsletter;
use App\User;

class SubscribtionController extends Controller
{

  public function subscribe(Newsletter $newsletter){


       auth()->user()->subscription($newsletter->id , User::SUBSCRIBE);

       return response()->json(['message' => 'abonnement effectuée avec succés']);

   }

    public function unsubscribe(Newsletter $newsletter){

        auth()->user()->subscription($newsletter->id , User::UNSUBSCRIBE);

        return response()->json(['message' => 'déabonnement effectuée avec succés']);

    }


}
