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
                <h4>
                    <i class="fas fa-copy"></i> &nbsp {{$newsletter->name}}
                </h4>
            </div>
            <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
            <!-- /.col -->
            <div class="col-8 invoice-col">

                <div class="text-md mt-3">
                    <strong>Name:</strong>
                    <article>{{$newsletter->name}}</article>
                </div>

                <div class="text-md mt-2">
                    <strong>Description:</strong>
                    <article>{{$newsletter->description}}</article>
                </div>

                <div class="text-md mt-2">
                    <strong>Status:</strong>
                    <article>{{$newsletter->active}}</article>
                </div>

                <div class="text-md mt-2">
                    <strong>Created at:</strong>
                    <p>{{$newsletter->created_at}}</p>
                </div>

                <div class="text-md mt-2">
                    <strong>Updated at:</strong>
                    <article>{{$newsletter->updated_at}}</article>
                </div>


            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Table row -->
        <div class="row mt-3">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{$tableTitle}}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    {!! $dataTable->table([
                                    'class'=>'table table-bordered table-hover dataTable dtr-inline'
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
@endsection

@push('js')
    {!! $dataTable->scripts()!!}
@endpush
