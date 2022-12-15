<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ asset('/') }}" class="brand-link">
        <img src="{{ asset('/BackEndSourceFile') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Book Rental</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('/BackEndSourceFile') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-list nav-icon "></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_cate_table') }}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage_cate') }}" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Manage Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-book nav-icon "></i>
                        <p>
                            Book
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('show_book_table') }}" class="nav-link">
                                <i class="fas fa-plus nav-icon"></i>
                                <p>Add Books</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage_book') }}" class="nav-link">
                                <i class="far fa-edit nav-icon"></i>
                                <p>Manage Books</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <div class="nav-item">
                    <a href="{{ route('manage_user') }}" class="nav-link">
                        <i class="nav-icon ion ion-person-add"></i>
                        <p>
                            User
                        </p>
                    </a>
                </div>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
