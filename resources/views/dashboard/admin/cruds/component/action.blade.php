<div class="d-inline-flex">

  <a href="{{ route('components.show', ['component'=>$id]) }}"> <i class="fas fa-eye"> </i> </a>&nbsp&nbsp
  
  <a href="{{ route('components.edit', ['component'=>$id]) }}"> <i class="fas fa-edit"></i> </a>&nbsp&nbsp
  
  <form action="{{route('components.destroy' , ['component'=>$id])}}" method="POST">
    @csrf
    @method("DELETE")

    <input class="btn btn-block btn-outline-danger btn-xs" type="submit" value="Delete" id="delete">


  </form>

</div>