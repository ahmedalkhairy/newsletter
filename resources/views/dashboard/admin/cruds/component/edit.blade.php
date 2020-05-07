@extends('dashboard.partials.layout')

@section('title' , 'home page')

@section('content')

<div class="container">
        <form class="kt-form" method="POST" action="{{route('components.update' , ['component'=>$component->id])}}">

                @csrf
                @method('PATCH')

                @include('dashboard.admin.cruds.component.form')
        </form>
</div>
@endsection