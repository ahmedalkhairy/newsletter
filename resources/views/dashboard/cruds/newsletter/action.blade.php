<div class="d-inline-flex">


    <a class="btn btn-primary m-2" href="{{route('newsletters.show' , ['newsletter'=>$id])}}">Show</a>

    <a class="btn btn-secondary m-2" href="{{route('newsletters.edit' , ['newsletter'=>$id])}}">Edit</a>

    <form action="{{route('newsletters.changeStatus' , ['newsletter'=>$id])}}" method="POST">
        @method('PATCH')
        @csrf
        <span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--primary">
            <label>
                <input class="active-newsletter" type="checkbox" {{$active=="Active"?'checked="checked"':""}} name="active">
                <span></span>
            </label>
        </span>
    </form>

</div>