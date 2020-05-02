<div class="d-inline-flex">

    <a class="btn btn-primary m-2" href="{{route('mails.show' , ['mail'=>$id])}}">Show</a>

    <a class="btn btn-secondary m-2" href="{{route('mails.edit' , ['mail'=>$id])}}">Edit</a>


    <form action="{{route('mails.destroy' , ['mail'=>$id])}}" method="POST">
        @csrf
        @method("DELETE")

        <input class="btn btn-danger m-2 btn-custom " type="submit" value="Delete">

    </form>

</div>