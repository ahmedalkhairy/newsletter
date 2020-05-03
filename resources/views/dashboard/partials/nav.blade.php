<nav class="main-header navbar navbar-expand navbar-navy navbar-navy">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    
      <!-- Notifications Dropdown Menu -->
     
      <li class="nav-item">
      <a class="nav-link" data-toggle="dropdown" href="#">
      <i  class="fas fa-th-large"></i></a>
     
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-divider"></div>


                    <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
                <img src="#" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <!-- <img src="{{asset(Auth::user()->photo)}}"  alt="User Avatar" class="img-size-50 img-circle mr-3"> -->
              <div class="media-body">
                <h3 class="dropdown-item-title">

             <!--   {{ Auth::user()->name }} -->

             <!--   {{ Auth::user()->prenom }}  -->
                  <span class="float-right text-sm text-muted"></span>
                </h3>
                <p class="text-sm">Mon profil </p>

              </div>
            </div>




                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="fas fa-cog"></i> Paramètres
                    </a>
                    <div class="dropdown-divider"></div>
                  <a  class="dropdown-item dropdown-footer" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Se déconnecter') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
          </a>
                </div>

            </li>

        </ul>
    </nav>