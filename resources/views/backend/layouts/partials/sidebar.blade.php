
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('home')}}" class="brand-link">
    <img src="{{asset('backend')}}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Dashboard</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{(!empty(Auth::user()->image))?asset('upload/user_images/'.Auth::user()->image):asset('upload/avtor.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{Auth::user()->name}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        @if(Auth::user()->usertype=="Admin")
        <li class="nav-item has-treeview @if(request()->routeIs('users.*')) menu-open @endif">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage User
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('users.view')}}" class="nav-link {{ Request::is('users/view') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View User</p>
              </a>
            </li>
          </ul>
        </li>
        @endif
        <li class="nav-item @if(request()->routeIs('profiles.*')) menu-open @endif">
          <a href="#" class="nav-link" :active="request()->routeIs('profiles.*')">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage Profile
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('profiles.view')}}" class="nav-link {{ Request::is('profiles.view') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('profiles.password.view')}}" class="nav-link {{ Request::is('profiles.password.view') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Password</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item @if(request()->routeIs('divisions.*')) menu-open @endif">
          <a href="#" class="nav-link" :active="request()->routeIs('divisions.*')">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage Division
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('divisions.index')}}" class="nav-link {{ Request::is('divisions.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Division</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item @if(request()->routeIs('districts.*')) menu-open @endif">
          <a href="#" class="nav-link" :active="request()->routeIs('districts.*')">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage District
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('districts.index')}}" class="nav-link {{ Request::is('districts.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View District</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item @if(request()->routeIs('upazilas.*')) menu-open @endif">
          <a href="#" class="nav-link" :active="request()->routeIs('upazilas.*')">
            <i class="nav-icon fas fa-copy"></i>
            <p>
              Manage Upazila
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('upazilas.index')}}" class="nav-link {{ Request::is('upazilas.index') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>View Upazila</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
