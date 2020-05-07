<div class="d-inline-flex">

<a href="{{ route('mails.show', ['mail'=>$id]) }}">   <i class="fas fa-eye"> </i> </a>&nbsp&nbsp
  <a href="{{ route('mails.edit', ['mail'=>$id]) }}"> <i class="fas fa-edit"></i> </a>&nbsp&nbsp


    <form action="{{route('mails.destroy' , ['mail'=>$id])}}" method="POST">
        @csrf
        @method("DELETE")

        <input class="btn btn-block btn-outline-danger btn-xs" type="submit" value="Delete">

    </form>

</div>

