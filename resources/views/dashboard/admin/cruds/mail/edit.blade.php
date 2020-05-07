@extends('dashboard.partials.layout')

@section('title' , $title??"Dashboard")


@section('content')



<div class="container">
    <form action="{{route('mails.update' , ['mail'=>$mail])}}" method="POST" role="form" id="quickForm" novalidate="novalidate">
        @method('PATCH')

        @include('dashboard.admin.cruds.mail.form')

    </form>
</div>

@endsection

