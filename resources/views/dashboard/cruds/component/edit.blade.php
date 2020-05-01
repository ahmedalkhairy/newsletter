@extends('dashboard.partials.layout')

@section('title' , $title??"Dashboard")


@section('content')


<div class="container">
    <form action="{{route('components.update' , ['newsletter'=>$newsletter])}}" method="POST" role="form" id="quickForm" novalidate="novalidate">
        @method('PATCH')

        @include('dashboard.cruds.component.form')

    </form>
</div>

@endsection
