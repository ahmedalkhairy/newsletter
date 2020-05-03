@extends('dashboard.sheared.form')


@section('form-body')


<div class="row">
    <div class="col-12">
        <div class="form-group">
            @csrf

            @php

            $input = "content";

            @endphp

            <label for="{{$input}}">Content</label>

            <input type="text" name="{{$input}}"
                value="{{  old($input)!==null  ? old($input) :  $component->{$input} }}"
                class="form-control @error($input) is-invalid @enderror" id="{{$input}}" placeholder="Enter content">

            @error($input)
            <p class="invalid-feedback">{{$message}}</p>
            @enderror

        </div>
    </div>
</div>


<div class="row">
    <div class="col-4">
        <div class="form-group validated">

            <label>Chose a type:</label>
            <div></div>
            <select class="custom-select form-control " name="type_id">
                <option selected disabled> </option>
                @foreach($types as $type)
                <option {{$component->type_id == $type->id ? 'selected' : '' }} value="{{ $type->id}}">{{ $type->type}}
                </option>
                @endforeach
            </select>
        </div>
    </div>
</div>


<div class="form-group">
    <div class="kt-form__actions">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
@endsection
