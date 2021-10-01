
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar  elevation-4" style="background-color:#1c1c1c;">
   <!-- Brand Logo -->
    <a href="{{url('/admin/home')}}" class="brand-link" >
      <img src="{{asset('backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="background-color:#1c1c1c;">
        <div class="image">
          <img src="{{asset('backend')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">User Module</a>
        </div>
      </div>
     @if(Request::is('admin*'))
      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item has-treeview  @if (Request::is('admin/user'))
           menu-open
          @endif">

            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-copy"></i>
              <p style="color:#ffffff;">
               {{__('sidebar.manage_user')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('user.index')}}" class="nav-link {{ Request::is('admin/user') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">{{__('sidebar.view_user')}}</p>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview  @if (Request::is('admin/profile') || Request::is('admin/view-password'))
           menu-open
          @endif">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p style="color:#ffffff;">
               {{__('sidebar.manage_profile')}}
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('profile.index')}}" class="nav-link {{ Request::is('admin/profile') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">{{__('sidebar.view_profile')}}</p>
                </a>
              </li>
            </ul>
              <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('view.password')}}" class="nav-link {{ Request::is('admin/view-password') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">{{__('sidebar.change_pass')}}</p>
                </a>
              </li>
            </ul>
       </li>

        </ul>
      </nav>
     @endif
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
