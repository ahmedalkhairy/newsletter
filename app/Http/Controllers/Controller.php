<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected function flashCreatedSuccessfully(){

        session()->flash('message' , 'Created successfully!');

    }


    protected function flashUpdatedSuccessfully(){

        session()->flash('message' , 'Updated successfully!');

    }

    protected function flashDeletedSuccessfully(){

        session()->flash('message' , 'Deleted successfully!');

    }

}
