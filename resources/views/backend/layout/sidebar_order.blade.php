
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar  elevation-4" style="background-color:#1c1c1c;">
   <!-- Brand Logo -->
    <a href="{{url('/admin/home')}}" class="brand-link" >
      <img src="{{asset('public/backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="background-color:#1c1c1c;">
        <div class="image">
          <img src="{{asset('public/backend')}}/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Order Module</a>
        </div>
      </div>
     @if(Request::is('admin*'))
      <!-- Sidebar Menu -->
      <nav class="mt-2" >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
           <li class="nav-item has-treeview @if (Request::is('admin/order') || Request::is('admin/pending-list') || Request::is('admin/approve-list'))
           menu-open
          @endif" id="side_order" >
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p style="color:#ffffff;">
               Order Management 
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" class="side_order">
              <li class="nav-item">
                <a href="{{route('order.pending.list')}}" class="nav-link {{ Request::is('admin/pending-list') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">Pending Orders</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview" class="side_order">
              <li class="nav-item">
                <a href="{{route('order.approve.list')}}" class="nav-link {{ Request::is('admin/approve-list') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="color:#faf619;">Approves Orders</p>
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
