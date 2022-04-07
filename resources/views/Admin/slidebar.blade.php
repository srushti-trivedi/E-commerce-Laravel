
<!-- Main Sidebar Container -->

 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <i class='fas fa-tablet-alt' style='font-size:24px'></i>
      <span class="brand-text font-weight-light">Phone World</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <!--  <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
         <i class='far fa-user-circle' style='font-size:37px;color:gray;'></i>
        </div>
        <div class="info">
          <a href="/welcome" class="d-block">Website App</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open"> 
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>DashBoard</p>
                  {{-- <i class="right fas fa-angle-left"></i> --}}
                </a>
              </li>
              <li class="nav-item {{ Request::is('colorform') ? 'active':''; }}">
                <a href="#" class="nav-link ">
                  <i class="fas fa-palette nav-icon"></i></i>
                  <p>
                    Colors{{-- <li class="nav-item {{ Request::is('path') ? 'active':''; }}">//path='colorlist' --}}
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item ">
                    <a href="/colorform" class="nav-link ">
                      <i class='fa fa-plus-square nav-icon'></i>
                      <p>Add</p>
                    </a>
                  </li>
                  <li class="nav-item {{ Request::is('colorlist') ? 'active':''; }}">
                    <a href="/colorlist" class="nav-link">
                      <i class="far fa-file-alt nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/trash-color" class="nav-link">
                      <i class="fa fa-trash nav-icon"  class="nav-link"></i>
                      <p>Trash</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class='fas fa-poll-h nav-icon'></i>
                  <p>
                    Brands
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/brandform" class="nav-link ">
                      <i class='fa fa-plus-square nav-icon'></i>
                      <p>Add</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/brandlist" class="nav-link">
                      <i class="far fa-file-alt nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/trash-brand" class="nav-link">
                      <i class="fa fa-trash nav-icon"  class="nav-link"></i>
                      <p>Trash</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class='fas fa-mobile-alt nav-icon' style='font-size:19px'></i>
                  <p>
                    Products
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="productform" class="nav-link ">
                      <i class='fa fa-plus-square nav-icon'></i>
                      <p>Add</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="productlist" class="nav-link">
                      <i class="far fa-file-alt nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="trash-product" class="nav-link">
                      <i class="fa fa-trash nav-icon"  class="nav-link"></i>
                      <p>Trash</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class='fas fa-store nav-icon'></i>
                  <p>
                    Orders
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/orderList" class="nav-link">
                      <i class="far fa-file-alt nav-icon"></i>
                      <p>List</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li> -->
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>