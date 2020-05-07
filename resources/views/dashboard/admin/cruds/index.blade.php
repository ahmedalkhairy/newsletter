@extends('dashboard.partials.layout')

@section('title' , $title??"Dashboard")

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card card-primary my-4">
                <div class="card-header ">
                    <h3 class="card-title">{{$title}}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body ">
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
</section>
@endsection

@push('js')

{!! $dataTable->scripts() !!}



<script>
    document.addEventListener('DOMContentLoaded' , function(){
        
        confirmMessage();
        
        activeToggle();
        
    });
    const csrf = "{{ csrf_token() }}";

</script>


<script src="{{ asset('js/functions.js') }} "></script>
@endpush