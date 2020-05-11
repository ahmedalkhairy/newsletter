@extends('dashboard.partials.layout')

@section('title' , $title ?? "Dashboard")

@section('content')


<div class=" container card card-solid">
    <div class="card-body pb-3">
        <div class="row d-flex align-items-stretch">
            <div class="col-12  align-items-stretch">
                <div class="card bg-light">
                    <div class="card-header text-muted border-bottom-1">

                        <h2 class="lead"><b> {{ $user->name}} {{ $user->last_name }} </b></h2>
                    </div>

                    <div class="col-6 text-center">

                        <img src="{{asset($user->picture_url)}} " alt="" class="img-size-60 img-circle img-fluid mr-3 ">

                        <div class="card-body pt-5 ">
                            <div class="row">
                                <div class="col-6">
                                    <ul class="ml-6 mb-2 fa-ul text-muted">
                                        <li class="big"><span class="fa-li"><i class="fa fa-user-circle"></i></span> Nom:
                                            {{ $user->name }}</li>
                                        <li class="big"><span class="fa-li"><i class="fa fa-user-circle"></i></span>
                                            Prenom:
                                            {{ $user->last_name }}</li>

                                        <li class="big"><span class="fa-li"><i class="fa fa-user"></i></span> Membre
                                            depuis
                                            : {{ $user->created_at->diffForHumans() }} </li>
                                        <li class="big"><span class="fa-li"><i class="far fa-envelope"></i></span>
                                            Addresse
                                            mail : {{ $user->email }}</li>
                                        <li class="big"><span class="fa-li"><i class="	fa fa-calendar"></i></span> Date
                                            de
                                            naissance : {{ $user->dob }} </li>

                                        <li class="big"><span class="fa-li"><i class="fa fa-edit"></i></span> Dernière
                                            modification : {{ $user->updated_at }} </li>
                                    </ul>
                                <a href="{{route('users.newsletters' , ['user' => $user->id])}}" class="btn btn-outline-primary">Newsletters</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    @endsection