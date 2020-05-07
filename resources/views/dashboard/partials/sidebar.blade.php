<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Accueil</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('storage/imgs/'.Auth::user()->picture_url)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('profile.show',Auth::user())}}" class="d-block"> {{Auth::user()->name}} {{Auth::user()->last_name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Newsletters
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
              <a href="{{route('newsletters.create')}}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Créer</p>
                </a>
              </li>

              <li class="nav-item">
              <a href="{{route('newsletters.index')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lister</p>
                </a>
              </li>

            </ul>
          </li>



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mails
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('mails.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Créer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('mails.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lister</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-certificate"></i>
              <p>
                Composants
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('components.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Créer</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('components.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lister</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
          <a href="{{route('users.index')}}" class="nav-link">
              <i class="nav-icon 	fas fa-user-friends"></i>
              <p>
                Inscrits
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Statistiques
              </p>
            </a>
          </li>



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
