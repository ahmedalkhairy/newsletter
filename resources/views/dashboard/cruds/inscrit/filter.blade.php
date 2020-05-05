extends('dashboard.partials.layout')

@section('title' , $title ?? "Dashboard")

@section('content')


@include('dashboard.cruds.sheared.form')

div class="row">
    <div class="col-12">
        <div class="form-group">
            

            <label for="name">Name</label>

            <input type="text" name="name"
                class="form-control " id="name" placeholder="Name">


        </div>
    </div>

    <div class="col-12">
        <div class="form-group">
            

            <label for="dob">dob</label>

            <input type="date" name="dob"
                class="form-control " id="dob" placeholder="dob">


        </div>
    </div>




@endsection