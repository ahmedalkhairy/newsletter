@extends('dashboard.partials.layout')

@section('title' , $title ?? "Dashboard")

@section('content')

<div class="py-4 m-3">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$title??"Dashboard"}}</h1>
                </div>
            </div>
        </div>
    </section>


    <div class="invoice p-3 mb-5">
        <!-- title row -->
        <div class="row">
            <div class="col-12">
                <h4>  <i class="fa fa-certificate"></i> &nbsp {{$component->content}}
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <!-- /.col -->
            <div class="col-8 invoice-col">

                <div class="text-md mt-3">
                    <strong>Content:</strong>
                    <article>{{$component->content}}</article>
                </div>

                <div class="text-md mt-2">
                    <strong>created_at:</strong>
                    <article>{{$component->created_at}}</article>
                </div>

                <div class="text-md mt-2">
                    <strong>updated_at:</strong>
                    <article>{{$component->updated_at}}</article>
                </div>
                
                
            </div>
            <!-- /.col -->
        </div>
        
</div>
@endsection


