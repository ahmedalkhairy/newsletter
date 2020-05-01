@extends('dashboard.partials.layout')

@section('title' , $title??"Dashboard")


@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{$title}}</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">

                    {!!$dataTable->table([

                      'class' =>'table table-bordered table-striped dataTable dtr-inline'

                    ]) !!}


                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')

    {!! $dataTable->scripts() !!}

@endpush
