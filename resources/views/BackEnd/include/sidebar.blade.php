@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp


<aside class="main-sidebar sidebar-dark-success elevation-4" style="background-color: black;">
    <!-- Brand Logo -->
    <a href="{{ asset('/home') }}" class="brand-link">
        <img src="{{ asset('/BackEndSourceFile') }}/dist/img/food-logo-templates-cover.png" alt="AdminLTE Logo" class="brand-image img-rectangle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">O F C S M S</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/BackEndSourceFile') }}/dist/img/Md_Abir_Hasan(300x300).jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                {{--====================== Category start here =========================--}}
                <li class="nav-item has-treeview {{ ($prefix=='/category')?'menu-open':'' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_cate_table') }}" class="nav-link {{ ($route=='show_cate_table')?'active':'' }}">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage_cate') }}" class="nav-link {{ ($route=='manage_cate')?'active':'' }} ">
                                <i class="fa fa-edit nav-icon"></i>
                                <p>Manage Category</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--====================== Category end here =========================--}}

                {{--====================== Delivery Boy start here =========================--}}
                <li class="nav-item has-treeview {{ ($prefix=='/delivery_boy')?'menu-open':'' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-truck"></i>
                        <p>
                            Delivery Boy
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_boy_table') }}" class="nav-link {{ ($route=='show_boy_table')?'active':'' }}">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Add Delivery Boy</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage_delivery_boy') }}" class="nav-link {{ ($route=='manage_delivery_boy')?'active':'' }}">
                                <i class="fa fa-edit nav-icon"></i>
                                <p>Manage Delivery Boy</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--====================== Delivery Boy end here ===========================--}}

                {{--====================== Coupon start here ===========================--}}
                <li class="nav-item has-treeview {{ ($prefix=='/coupon')?'menu-open':'' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-ticket-alt"></i>
                        <p>
                            Coupon
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_coupon_table') }}" class="nav-link {{ ($route=='show_coupon_table')?'active':'' }}">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Add Coupon</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage_coupon_table') }}" class="nav-link {{ ($route=='manage_coupon_table')?'active':'' }}">
                                <i class="fa fa-edit nav-icon"></i>
                                <p>Manage Coupon</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--====================== Coupon end here ===========================--}}

                {{--====================== Dish start here ===========================--}}
                <li class="nav-item has-treeview {{ ($prefix=='/dish')?'menu-open':'' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-hamburger" aria-hidden="true"></i>
                        <p>
                            Dish
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_dish_table') }}" class="nav-link {{ ($route=='show_dish_table')?'active':'' }}">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Add Dish</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage_dish_table') }}" class="nav-link {{ ($route=='manage_dish_table')?'active':'' }}">
                                <i class="fa fa-edit nav-icon"></i>
                                <p>Manage Dish</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{--====================== Dish end here ===========================--}}

                {{-- ================ Order start here ==================================--}}

                <li class="nav-item has-treeview {{ ($prefix=='/order')?'menu-open':'' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-utensils" aria-hidden="true"></i>
                        <p>
                            Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_order') }}" class="nav-link {{ ($route=='show_order')?'active':'' }}">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Manage Order</p>
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- ================ Order end here ==================================--}}

              {{-- ================ Reports start here ==================================--}}


               <li class="nav-item has-treeview {{ ($prefix=='/order')?'menu-open':'' }}">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-cogs" aria-hidden="true"></i>
                        <p>
                            Report
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('booking_report') }}" class="nav-link {{ ($route=='booking_report')?'active':'' }}">
                                <i class="fa fa-plus-circle nav-icon"></i>
                                <p>Report List</p>
                            </a>
                        </li>
                    </ul>
                </li>



                {{-- ================ Reports end here ==================================--}}


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
