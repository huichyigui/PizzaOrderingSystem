  {{-- Author: Fong Zhi Jun --}}
  <nav class="pcoded-navbar">
      <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
      <div class="pcoded-inner-navbar main-menu">
          <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Overview</div>

          @if (auth()->user()->role_level == 8)
              <ul class="pcoded-item pcoded-left-item">
                  <li class="@if ($name == 'Dashboard') active @endif">
                      <a href="{{ url('admin/index') }}">
                          <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                          <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
              </ul>
          @else
              <ul class="pcoded-item pcoded-left-item">
                  <li class="@if ($name == 'Dashboard') active @endif">
                      <a href="{{ url('profile') }}">
                          <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                          <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
              </ul>
          @endif

          <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Profile</div>
          <ul class="pcoded-item pcoded-left-item">
              <li class="@if ($name == 'UpdateProfile') active @endif">
                  <a href="{{ url('profile/update') }}">
                      <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                      <span class="pcoded-mtext" data-i18n="nav.form-components.main">Update Profile</span>
                      <span class="pcoded-mcaret"></span>
                  </a>
              </li>
          </ul>

          @if (auth()->user()->role_level == 8)
              <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Menu Management</div>
              <ul class="pcoded-item pcoded-left-item">
                  <li class="@if ($name == 'Create Menu') active @endif">
                      <a href="{{ url('admin/addMenu') }}">
                          <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Add Menu</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
                  <li class="@if ($name == 'Manage Menu') active @endif">
                      <a href="{{ url('admin/manageMenu') }}">
                          <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Manage Menu</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
              </ul>
              <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">User Management</div>
              <ul class="pcoded-item pcoded-left-item">
                  <li class="@if ($name == 'viewAllUsers') active @endif">
                      <a href="{{ url('admin/viewAllUsers') }}">
                          <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Manage Users</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
                  <li class="@if ($name == 'viewUserReport') active @endif">
                      <a href="{{ url('admin/userreport') }}">
                          <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                          <span class="pcoded-mtext" data-i18n="nav.form-components.main">View User Report</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
              </ul>
          @endif

          @if (auth()->user()->role_level == 2 || auth()->user()->role_level == 8)
              <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Order Status Management</div>
              <ul class="pcoded-item pcoded-left-item">
                  <li class="@if ($name == 'rider') active @endif">
                      <a href="{{ url('rider') }}">
                          <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Update Order Status</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
              </ul>
          @endif

          @if (auth()->user()->role_level == 1)
              <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Order Status</div>
              <ul class="pcoded-item pcoded-left-item">
                  <li class="@if ($name == 'checkStatus') active @endif">
                      <a href="{{ url('checkStatus') }}">
                          <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                          <span class="pcoded-mtext" data-i18n="nav.form-components.main">Check Order Status</span>
                          <span class="pcoded-mcaret"></span>
                      </a>
                  </li>
              </ul>
          @endif
      </div>
  </nav>
