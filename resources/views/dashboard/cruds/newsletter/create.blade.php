@extends('dashboard.partials.layout')

@section('title' , $title??"Dashboard")


@section('content')


<div class="container">
    <form action="{{route('newsletters.store')}}" method="POST" role="form" id="quickForm" novalidate="novalidate">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" name="name" value="{{old('name')}}"
                    class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter name">
                @error('name')
                <p class="invalid-feedback">{{$message}}</p>
                @enderror
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- textarea -->
                    <div class="form-group">
                        
                        <label>Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"
                            rows="3" placeholder="Enter Description">{{old('description')}}</textarea>

                        @error('description')
                        <p class="invalid-feedback">{{$message}}</p>
                        @enderror
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
