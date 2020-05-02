@extends('dashboard.partials.layout')

@section('title' , $title??"Dashboard")


@section('content')

<div class="container">
    <form action="{{route('mails.update' , ['mail'=>$mail->id])}}" method="POST" role="form" id="quickForm" novalidate="novalidate">
        @csrf

        @method('PATCH')

        <div class="card-body">

            <div class="form-group">

                @php

                $input = "title";

                @endphp

                <label for="{{$input}}">Title</label>

                <input type="text" name="{{$input}}" value="{{  old($input)!==null  ? old($input) :  $mail->{$input} }}"
                    class="form-control @error($input) is-invalid @enderror" id="{{$input}}" placeholder="Enter name">

                @error($input)
                <p class="invalid-feedback">{{$message}}</p>
                @enderror

            </div>

            <div class="form-group">

                 @php

               $input = "content";
 
                @endphp

       <label for="{{$input}}">Content</label>

     <input type="text" name="{{$input}}" value="{{  old($input)!==null  ? old($input) :  $mail->{$input} }}"
    class="form-control @error($input) is-invalid @enderror" id="{{$input}}" placeholder="Enter name">

    @error($input)
   <p class="invalid-feedback">{{$message}}</p>
     @enderror

      </div>

            
                
                    <div class="form-group">
                    <div class="row">
                    <div class="col-md-4">
                <label>Chose a newsletter :</label>
                <div></div>
                <select class="custom-select form-control " name="newsletter_id">
                    <option selected disabled> </option>
                    @foreach($newsletters as $newsletter)
                        <option value="{{$newsletter->id}}">{{$newsletter->name}}</option>
                    @endforeach
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