@php
// Author: Gui Hui Chyi
@endphp

{{-- Author: Gui Hui Chyi --}}
<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Overview</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="@if ($name == "Dashboard")active @endif">
                <a href="{{url('admin/index')}}">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">Menu</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="@if ($name == "Create Menu")active @endif">
                <a href="{{url('admin/addMenu')}}">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Add Menu</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="@if ($name == "Manage Menu")active @endif">
                <a href="{{url('admin/manageMenu')}}">
                    <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Manage Menu</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
