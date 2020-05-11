<div class="d-inline-flex">

    <a href="{{ route('profile.show', ['user'=>$id]) }}"> <i class="fas fa-eye"> </i> </a>&nbsp&nbsp

    
    <form action="{{route('users.destroy' , ['user'=>$id])}}" method="POST">
      @csrf
      @method("DELETE")
      <input class="btn btn-block btn-outline-danger btn-xs" type="submit" value="Delete" id="delete">
    </form>
  
  </div>