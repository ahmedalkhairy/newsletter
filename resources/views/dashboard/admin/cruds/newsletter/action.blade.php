<div class="d-inline-flex">


    <div class="m-2">
        <a href="{{ route('newsletters.show', ['newsletter'=>$id]) }}"> <i class="fas fa-eye"> </i> </a>&nbsp;
    </div>

    <div class="m-2">
        <a href="{{ route('newsletters.edit', ['newsletter'=>$id]) }}"> <i class="fas fa-edit"></i> </a>&nbsp;
        
    </div>

    <div class="m-2">
        <div class="custom-control custom-switch">

            <input type="checkbox" class="custom-control-input" {{$active=="Active"?'checked="checked"':""}}
                id="customSwitch{{$id}}">
            <label class="custom-control-label" for="customSwitch{{$id}}"></label>
        </div>
    </div>

</div>
