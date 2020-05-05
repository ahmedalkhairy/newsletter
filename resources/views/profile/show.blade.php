@extends('dashboard.partials.layout')

@section('title' , $title ?? "Dashboard")

@section('content')




<div class=" container card card-solid">
        <div class="card-body pb-3">
          <div class="row d-flex align-items-stretch">
            <div class="col-12  align-items-stretch">
              <div class="card bg-light">
                <div class="card-header text-muted border-bottom-1">
               
                <h2 class="lead"><b>  {{ Auth::user()->name}} {{ Auth::user()->last_name }} </b></h2>
                </div>
                <div class="card-body pt-5 ">
                  <div class="row">
                    <div class="col-6">
                      

                      <ul class="ml-6 mb-2 fa-ul text-muted">
                      <li class="big"><span class="fa-li"><i class="fa fa-user-circle"></i></span> Nom : {{ Auth::user()->name }}</li>
                      <li class="big"><span class="fa-li"><i class="fa fa-user-circle"></i></span> Prenom: {{ Auth::user()->last_name }}</li>

                      <li class="big"><span class="fa-li"><i class="fa fa-user"></i></span> Membre depuis : {{ Auth::user()->created_at->diffForHumans() }} </li>
                        <li class="big"><span class="fa-li"><i class="far fa-envelope"></i></span> Addresse mail : {{ Auth::user()->email }}</li>
                        <li class="big"><span class="fa-li"><i class="	fa fa-calendar"></i></span> Date de naissance : {{ Auth::user()->dob }} </li>
                          
                          <li class="big"><span class="fa-li"><i class="fa fa-edit"></i></span> Dernière modification : {{ Auth::user()->updated_at }} </li>
                      </ul>
                    </div>
                    <div class="col-6 text-center">
                    
                    
                      <img src="{{asset('storage/imgs/'.Auth::user()->picture_url)}} " alt="" class="img-size-60 img-circle img-fluid mr-3 ">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">

                    </a>
                  
                  </div>
                </div>
              </div>
            </div>




@endsection


