@extends('dashboard.partials.layout')

@section('title' , $title ?? "Dashboard")

@section('content')


<div class="container">
    <form action="{{route('components.store')}}" method="POST" role="form" id="quickForm" novalidate="novalidate">

        @include('dashboard.cruds.component.form')

    </form>

</div>

@endsection
