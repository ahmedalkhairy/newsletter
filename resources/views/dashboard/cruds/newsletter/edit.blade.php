@extends('dashboard.partials.layout')

@section('title' , $title??"Dashboard")


@section('content')


<div class="container">
    <form action="{{route('newsletters.update' , ['newsletter'=>$newsletter])}}" method="POST" role="form" id="quickForm" novalidate="novalidate">
        @method('PATCH')

        @include('dashboard.cruds.newsletter.form')

    </form>
</div>

@endsection
