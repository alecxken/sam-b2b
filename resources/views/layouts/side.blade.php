<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Admin Menu</span>
                </li>
                <li class="">
                    <a href="{{ url('home') }}" class="noti-dot "><i class="la la-home"></i> <span>Dashboard</span></a>
                </li>
                <li class="submenu {{ request()->is('index-product') ? 'active' : '' }} {{ request()->is('orders') ? 'active' : '' }}">
                    <a href="#"><i class="fa  fa-list-ul"></i> <span>Supplier Module </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ request()->is('index-product') ? 'active' : '' }}"
                                href="{{ url('index-product') }}">Stock Items</a></li>
                        <li><a class="{{ request()->is('orders') ? 'active' : '' }}"
                                href="{{ url('orders') }}">Active Orders</a></li>
                       

                    </ul>
                </li>

                 <li class="submenu {{ request()->is('index-address') ? 'active' : '' }}  {{ request()->is('index-order') ? 'active' : '' }} {{ request()->is('myorders') ? 'active' : '' }} ">
                    <a href="#"><i class="fa  fa-list-ul"></i> <span>Retail Module </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ request()->is('index-order') ? 'active' : '' }}"
                                href="{{ url('index-order') }}">Order Products</a></li>
                        <li><a class="{{ request()->is('myorders') ? 'active' : '' }}"
                                href="{{ url('myorders') }}">My Orders</a></li>
                                   <li><a class="{{ request()->is('index-address') ? 'active' : '' }}"
                                href="{{ url('index-address') }}">Shipping Address</a></li>
                       

                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-files-o"></i> <span> Report Module </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="{{ request()->is('disbursement-report') ? 'active' : '' }}"
                                href="{{ url('disbursement-report') }}">Disbursement Report</a></li>

                        <li><a class="{{ request()->is('mail-report') ? 'active' : '' }}"
                                href="{{ url('mail-report') }}">Beneficiary Status </a></li>


                    </ul>
                </li>


                <li class="submenu">
                    <a href="#"><i class="fa fa-cogs"></i> <span>General Settings</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">

                        <li><a class="{{ request()->is('dropdown-settings') ? 'active' : '' }}"
                                href="{{ url('dropdown-settings') }}" class="nav-sub-link">Dropdown Settings</a></li>

                        @role('Admin')
                            <li><a class="{{ request()->is('create_user') ? 'active' : '' }}"
                                    href="{{ url('create_user') }}" class="nav-sub-link">User Management</a></li>

                            <li><a class="{{ request()->is('admin') ? 'active' : '' }}" href="{{ url('admin') }}"
                                    class="nav-sub-link">Role Management</a></li>
                        @endrole

                    </ul>
                </li>








            </ul>
        </div>
    </div>
</div>
