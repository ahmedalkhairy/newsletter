@extends('dashboard.partials.layout')

@section('title' , 'home page')


@section('content')


<div class="container">
    <form action="{{route('components.store')}}" method="POST" role="form" id="quickForm" novalidate="novalidate">
        @csrf
        @include('dashboard.admin.cruds.component.form')


    </form>

</div>

@endsection

