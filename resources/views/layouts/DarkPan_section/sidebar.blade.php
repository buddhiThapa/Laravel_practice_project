<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ route('Dark-Pan-theme.index') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Laravel</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ url('DarkPan/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ auth()->user()->name}}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="javascript:void(0)" class="nav-item nav-link theme_pages_bt"><i class="fa fa-th me-2"></i>Theme Pages</a>
            <div class="theme_pages" style="display: none">
                <a href="{{ route('Dark-Pan-theme.index') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('Dark-Pan-theme.button') }}" class="dropdown-item">Buttons</a>
                        <a href="{{ route('Dark-Pan-theme.typography') }}" class="dropdown-item">Typography</a>
                        <a href="{{ route('Dark-Pan-theme.element') }}" class="dropdown-item">Other Elements</a>
                    </div>
                </div>
                <a href="{{ route('Dark-Pan-theme.widget') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Widgets</a>
                <a href="{{ route('Dark-Pan-theme.forms') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                <a href="{{ route('Dark-Pan-theme.table') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                <a href="{{ route('Dark-Pan-theme.chart') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('Dark-Pan-theme.Sign_in') }}" class="dropdown-item">Sign In</a>
                        <a href="{{ route('Dark-Pan-theme.Sign_up') }}" class="dropdown-item">Sign Up</a>
                        <a href="{{ route('Dark-Pan-theme.error_page') }}" class="dropdown-item">404 Error</a>
                        <a href="{{ route('Dark-Pan-theme.blank') }}" class="dropdown-item">Blank Page</a>
                    </div>
                </div>

            </div>


            <div class="extra_page" >
                <a href="{{ route('Dark-Pan-theme.index') }}" class="nav-item nav-link active"><i class="fa fa-user" aria-hidden="true"></i>Extra Pages</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>User Master</a>
                    <div class="dropdown-menu bg-transparent border-0">
                        <a href="{{ route('Dark-Pan-theme.user.index') }}" class="dropdown-item {{ Request::is('Dark-Pan-theme/user') ? 'active' : ''}}">User List</a>
                    </div>
                </div>
                

            </div>
        </div>
    </nav>
</div>

<!-- Sidebar End -->