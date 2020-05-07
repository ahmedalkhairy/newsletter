<?php

namespace App\Http\Controllers\Admin;


use App\DataTables\NewsletterDataTable;
use App\DataTables\NewsletterMailsDataTable;
use App\Newsletter;
use App\Http\Requests\Newsletter\UpdateRequest;
use App\Http\Requests\Newsletter\StoreRequest;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(NewsletterDataTable $datatable)
    {

        $title = "Liste des newsletters";


        return $datatable->render('dashboard.admin.cruds.index' , compact('title'));

        // return view('dashboard.cruds.newsletter.index' , compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Newsletter $newsletter)
    {



        $title = "Ajouter une newsletter";

        return view('dashboard.admin.cruds.newsletter.create' , compact('title' , 'newsletter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $newsletter =  Newsletter::create($request->all());

        $this->flashCreatedSuccessfully();

        return redirect($newsletter->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */

    public function show(Newsletter $newsletter , NewsletterMailsDataTable $newsletterMailsDataTable)
    {

        $title = "Newsletter Page";

        $tableTitle = "Mails Table";

        return $newsletterMailsDataTable->setNewsletterId($newsletter->id)->render('dashboard.admin.cruds.newsletter.show' ,compact('newsletter', 'title' , 'tableTitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {

        $title = "Modifier une newsletter";

        return view('dashboard.admin.cruds.newsletter.edit', compact('newsletter', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateRequest $request, Newsletter $newsletter)
    {

        $newsletter->update($request->all());

        $this->flashUpdatedSuccessfully();

        return redirect($newsletter->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        //
    }


    public function changeStatus(Newsletter $newsletter)
    {


        if (request()->has('active')) {

            $newsletter->update([
                'active' => "1"
            ]);

        } else {

            $newsletter->update([
                'active' => "0"
            ]);

        }

        $this->flashUpdatedSuccessfully();

        return redirect()->back();
    }
}
