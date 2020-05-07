<?php
namespace App\Http\Controllers\Admin;


use App\Component;
use App\DataTables\ComponentDataTable;
use App\Http\Requests\Component\StoreRequest;
use App\Http\Requests\Component\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Type;

class ComponentController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ComponentDataTable $componentDataTable)
    {
        $title = "Liste des Components";
        return $componentDataTable->render('dashboard.admin.cruds.index',compact('title'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Component $component)
    {
        $title = "créer un composant";
        $types=Type::all();


        return view('dashboard.admin.cruds.component.create' , compact('title','types' , 'component'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $component =  Component::create($request->all());
        $this->flashCreatedSuccessfully();

        return redirect($component->path());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function show(Component $component)
    {
        return view('dashboard.admin.cruds.component.show' , compact('component'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function edit(Component $component)
    {
        $title = "Modifier le component";
        $types=Type::all();

        return view('dashboard.admin.cruds.component.edit' , compact('component' , 'title','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Component $component)
    {

        $component->update($request->all());
        $this->flashUpdatedSuccessfully();

        return redirect($component->path());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Component  $component
     * @return \Illuminate\Http\Response
     */
    public function destroy(Component $component)
    {

        $component->delete();

        $this->flashDeletedSuccessfully();

        return redirect()->route('components.index');
    }
}
