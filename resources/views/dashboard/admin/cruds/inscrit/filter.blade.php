@extends('dashboard.partials.layout')

@section('title' , $title ?? "liste des inscrits")

@section('content')



@component('dashboard.admin.cruds.inscrit.form' , ['title' =>$title])



<div class="row">
    <div class="col-sm-12">
        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
            aria-describedby="example1_info">
            <thead>
                <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                        ID</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending">Name</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Platform(s): activate to sort column ascending">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="Engine version: activate to sort column ascending">Created at</th>
                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                        aria-label="CSS grade: activate to sort column ascending">Updated at</th>

                    <th  tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                    aria-label="CSS grade: activate to sort column ascending">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>

@endcomponent

@endsection

@push('js')
    
<script>
$(document).ready( function () {

    $('#example1').DataTable({
           processing: true,
           serverSide: true,
           ajax: "{{ route('users.index') }}",
           columns: [
                    { data: 'id', name: 'id' },
                    { data: 'full_name', name: 'full_name' },
                    { data: 'email', name: 'email' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'updated_at', name: 'updated_at' }
                 ]
        });


    });

</script>
@endpush