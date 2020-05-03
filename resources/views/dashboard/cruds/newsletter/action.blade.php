<div class="d-inline-flex">


<a href="{{ route('newsletters.show', ['newsletter'=>$id]) }}">   <i class="fas fa-eye"> </i> </a>&nbsp&nbsp
            <a href="{{ route('newsletters.edit', ['newsletter'=>$id]) }}"> <i class="fas fa-edit"></i> </a>&nbsp&nbsp



                  <form action="{{route('newsletters.changeStatus' , ['newsletter'=>$id])}}" method="POST">
        @method('PATCH')
        @csrf
        


        <div class="form-group">
                    <div class="custom-control custom-switch">
                    
                      <input type="checkbox" class="custom-control-input" {{$active=="Active"?'checked="checked"':""}} id="customSwitch1">
                      <label class="custom-control-label" for="customSwitch1"></label>
                    </div>
                  </div>
        
    </form>

   </div>
 