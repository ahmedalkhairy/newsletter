<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        if (request()->ajax()) {

            return DataTables::of(User::query())

                ->filter(function ($query) {

                    /**
                     *  select users.id , users.name , users.email , users.dob , users.role
                     *  
                     * from users
                     * 
                     * inner join newsletter_user on users.id = newsletter_user.id 
                     * 
                     * inner join newsletters on newsletter_user.newsletter_id = newsletters.id 
                     * 
                     * where newsletters.name like request()->name and newsletter_user.inscription = 1
                     * 
                     */
                    if (request()->input('name')) {

                        $query->whereHas('newsletters', function ($query) {

                            $query->where('name', 'LIKE', '%' . request()->input('name') . '%')

                                ->where('newsletter_user.inscription', User::SUBSCRIBE);
                        });

                    }


                    /**
                     * select users.id , users.name , users.email , users.dob , users.role
                     * from users 
                     * where users.email like '% request->email %'
                     */
                    if (request()->input('email')) {

                        $query->orWhere('email',  'LIKE', '%' . request()->input('email') . '%');
                    }


                    /**
                     *  newsletters    newsletter_user     users 
                     *  
                     * 
                     */
                    if(request()->input('date')){

                        $query->orWhereHas('newsletters' ,function($query){

                            $query->whereDate('newsletter_user.updated_at' , request()->input('date'))
                                  ->where('newsletter_user.inscription', User::SUBSCRIBE);


                        });

                    }
                })

                ->addColumn('full_name', function ($user) {
                    return "$user->name $user->last_name";
                })

                ->addColumn('newsletter', function ($user) {

                    return $user->newsletters()->where('newsletter_user.inscription' , User::SUBSCRIBE)->count();
                })

                ->addColumn('action', function () {

                    return '<p>hello</p>';
                })
                ->rawColumns(['action'])

                ->toJson();
        }

        $title = 'liste des inscrits';

        return view('dashboard.admin.cruds.inscrit.filter', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
