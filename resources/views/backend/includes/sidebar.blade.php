<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ url('/assets/backend/img/empathy.png') }}" alt="{{ env('APP_NAME','Application') }}" class="brand-image elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME','Moves BD') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item has-treeview {{ (request()->is('admin/dashboard*') || request()->is('admin/plans*') || request()->is('admin/appearance*') || request()->is('admin/contact-us*') || request()->is('admin/users*') ? 'menu-open' : '') }}">
                    <a href="#" class="nav-link {{ (request()->is('admin/dashboard*') || request()->is('admin/plans*') || request()->is('admin/appearance*') || request()->is('admin/contact-us*')  || request()->is('admin/users*') ? 'active' : '') }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>Administration<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard.index') }}" class="nav-link {{ (request()->is('admin/dashboard*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.plans.index') }}" class="nav-link {{ (request()->is('admin/plans*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Plans</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.appearance.index') }}" class="nav-link {{ (request()->is('admin/appearance*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Appearance</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.contact-us.index') }}" class="nav-link {{ (request()->is('admin/contact-us*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact Us</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ (request()->is('admin/users*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Users</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ (request()->is('admin/sliders*') || request()->is('admin/why-choose-us*') || request()->is('admin/gallery*') || request()->is('admin/testimonials*') || request()->is('admin/blogs*') ? 'menu-open' : '') }}">
                    <a href="#" class="nav-link {{ (request()->is('admin/sliders*') || request()->is('admin/why-choose-us*') || request()->is('admin/gallery*') || request()->is('admin/testimonials*') || request()->is('admin/blogs*') ? 'active' : '') }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Home Management<i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.sliders.index') }}" class="nav-link {{ (request()->is('admin/sliders*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.gallery.index') }}" class="nav-link {{ (request()->is('admin/gallery*') ? 'active' : '') }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Gallery</p>
                            </a>
                        </li>
                    </ul>
                </li>

{{--                <li class="nav-item">--}}
{{--                    <a href="{{ route('admin.addictions.index') }}" class="nav-link {{ (request()->is('admin/addictions*') ? 'active' : '') }}">--}}
{{--                        <i class="nav-icon fas fa-list-alt"></i>--}}
{{--                        <p>Addictions</p>--}}
{{--                    </a>--}}
{{--                </li>--}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
