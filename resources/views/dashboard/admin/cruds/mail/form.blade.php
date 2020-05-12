@extends('dashboard.sheared.form')


@section('form-body')



    @push('css')

        {{-- remove scroll from the page --}}
        <style>
            body {
                overflow-y: hidden;
            }
        </style>
    @endpush

    <div class="overflow-hidden container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    @csrf

                    @php

                        $input = "title";

                    @endphp

                    <label for="{{$input}}">Title</label>

                    <input type="text" name="{{$input}}"
                           value="{{  old($input)!==null  ? old($input) :  $mail->{$input} }}"
                           class="form-control @error($input) is-invalid @enderror" id="{{$input}}"
                           placeholder="Enter Title"  >

                    @error($input)
                    <p class="invalid-feedback">{{$message}}</p>
                    @enderror

                </div>
            </div>
        </div>


        <div class="row">
@php
  $ids=  $mail->components->pluck('type_id')->toArray();


@endphp

            <div class="col-md-4">
                <label>Select  Components Types :</label>
                <div></div>
                <select class="custom-select form-control " name="content_types[]"  id="content_types" multiple >

                    <option disabled selected>select Types (multiple)</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}" {{in_array($type->id,$ids) ? 'selected' :'' }}>
                            {{$type->type}}</option>
                    @endforeach
                </select>
            </div>


        </div>


        {{-- hide the status select in the create page , number 2 for the check the segment 2 is create or not --}}
        <div class="form-group">
            <div class="row">
                <div class="col-md-4">
                    <label>Chose a newsletter :</label>
                    <div></div>
                    <select class="custom-select form-control " id="newsletter_id" name="newsletter_id" >

                        <option disabled selected>select newsletter</option>
                        @foreach($newsletters as $newsletter)
                            <option
                                    {{$mail->newsletter_id == $newsletter->id ? 'selected' : '' }} value="{{$newsletter->id}}">
                                {{$newsletter->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>


        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary" v-on:click="store_mail">
        </div>
    </div>





@endsection
