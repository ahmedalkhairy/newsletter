@extends('client.partials.layout')


@section('content')


<div class="col-10 d-flex justify-content-center mx-auto">

    <div class="card-body mx-auto">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">{{$title ?? 'liste des newslettersType a message'}}</h3>
            </div>
            <div class="card-body">


                @foreach ($newsletters as $newsletter)


                <div data-newletter_id="{{ $newsletter->id }}" class="icheck-primary">
                    <input  {{auth()->user()->isSubscribe($newsletter->id)?'checked':'' }}  class="newsletters" type="checkbox" id="checkboxPrimary{{$newsletter->id}}">
                    <label for="checkboxPrimary{{$newsletter->id}}">
                        {{ $newsletter->name }}
                    </label>
                </div>

                @endforeach
            </div>

            <div class="pagination">
                {{ $newsletters->links() }}
            </div>
        </div>
    </div>
</div>


@endsection


@push('js')



<script>
    const csrf = "{{ csrf_token() }}";
</script>
<script src="{{ asset('js/functions.js') }} "></script> 

<script>
    subscriptionToggle();

</script>
@endpush