@extends('dashboard.partials.layout')

@section('title' , $title??"Dashboard")


@section('content')


<div class="container">
    <form action="{{route('newsletters.update' , ['newsletter'=>$newsletter])}}" method="POST" role="form" id="quickForm" novalidate="novalidate">
        @csrf

        @method('PATCH')

        <div class="card-body">

            <div class="form-group">

                @php

                $input = "name";

                @endphp

                <label for="{{$input}}">Name</label>

                <input type="text" name="{{$input}}" value="{{  old($input)!==null  ? old($input) :  $newsletter->{$input} }}"
                    class="form-control @error($input) is-invalid @enderror" id="{{$input}}" placeholder="Enter name">

                @error($input)
                <p class="invalid-feedback">{{$message}}</p>
                @enderror

            </div>


            <div class="row">
                <div class="col-12">
                    <!-- textarea -->
                    <div class="form-group">

                        @php

                        $input = "description";

                        @endphp

                        <label for="{{$input}}">Description</label>

                        <textarea id="{{$input}}" class="form-control @error($input) is-invalid @enderror"
                            name="{{$input}}" rows="3"
                            placeholder="Enter Description">{{ $newsletter->{$input} }}</textarea>

                        @error($input)
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror

                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label for="active">Status</label>
                        <select name="active" id="active" class="form-control">
                            <option  {{$newsletter->getOriginal('active')=='1'?'selected':''}}    value="1">Active</option>
                            <option  {{$newsletter->getOriginal('active')=='0'?'selected':''}}  value="0">Inactive</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="form-group">
                <input type="submit" value="Submit" class="btn btn-primary">
            </div>
        </div>

    </form>

</div>

@endsection
