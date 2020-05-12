<?php

namespace App\Http\Controllers\Admin;

use App\Component;
use App\DataTables\MailDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Mail\StoreRequest;
use App\Http\Requests\Mail\UpdateRequest;
use App\Mail;
use App\Newsletter;
use App\Type;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MailDataTable $mailDataTable)
    {

        $title = "Liste des Mails";


        return $mailDataTable->render('dashboard.admin.cruds.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Mail $mail)
    {
        $title = "Construire un mail";

        $newsletters = Newsletter::all();

        if ($newsletters->isEmpty()) {


            $this->flashErrorMessage('Il faut ajouter une newsletter');

            return redirect()->route('newsletters.create');
        }

        $types = Type::get();


        return view('dashboard.admin.cruds.mail.edit', compact('title', 'newsletters', 'mail', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {

        $mail = new Mail();
        $mail->title = $request->title;
        $mail->content = '';
        $mail->newsletter_id = $request->newsletter_id;

        $mail->save();



        if ($request->has('content_types')) {
            foreach ($request->content_types as $content_type) {
                $component = new Component();
                $component->mail_id = $mail->id;
                $component->type_id = $content_type;
                $component->content = '';
                $component->save();
            }
        }

     //   $this->flashCreatedSuccessfully();
        return response()->json(route('mails.edit' , ['mail'=>$mail]));

     //   return redirect($mail->path());
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Mail $mail
     * @return \Illuminate\Http\Response
     */
    public function show(Mail $mail)
    {

        //load the  newsletter relationship
        $mail->load('newsletter');

        // dd($mail);
        return view('dashboard.admin.cruds.mail.show', compact('mail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Mail $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
        $title = "Modifier un mail";

        $newsletters = Newsletter::all();
        $types = Type::get();


        return view('dashboard.admin.cruds.mail.edit', compact('mail', 'title', 'newsletters', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Mail $mail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Mail $mail)
    {


        $mail->update($request->only('newsletter_id', 'title'));

        $components = $mail->components;
        foreach ($components as $component) {
            if (!in_array($component->id, $request->content_types)) {
                $component->delete();

            }
        }
        $ids = $mail->components->pluck('type_id')->toArray();

        foreach ($request->content_types as $content_type) {

            if (!in_array($content_type, $ids)) {
                $component = new Component();
                $component->mail_id = $mail->id;
                $component->type_id = $content_type;
                $component->content = '';
                $component->save();

            }

        }


     //   $this->flashUpdatedSuccessfully();

        return response()->json($mail->path());
    }

    public function update_components(Request $request)
    {

        foreach ($request->components as $key => $value) {
            $component = Component::find($key);
            $component->content = $value;
            $component->save();


        }


        $this->flashUpdatedSuccessfully();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Mail $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $mail)
    {
        $mail->delete();

        $this->flashDeletedSuccessfully();

        return redirect()->back();
    }
}
