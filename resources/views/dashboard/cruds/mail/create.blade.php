@extends('dashboard.partials.layout')

@section('title' , $title ?? "Dashboard")

@section('content')


<div class="container">
    <form action="{{route('mails.store')}}" method="POST" role="form" id="quickForm" novalidate="novalidate">

        @include('dashboard.cruds.mail.form')

    </form>

</div>

@endsection
