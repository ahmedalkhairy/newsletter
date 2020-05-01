@extends('dashboard.partials.layout')

@section('title' , $title ?? "Dashboard")

@section('content')


<div class="container">
    <form action="{{route('newsletters.store')}}" method="POST" role="form" id="quickForm" novalidate="novalidate">

        @include('dashboard.cruds.newsletter.form')

    </form>

</div>

@endsection
