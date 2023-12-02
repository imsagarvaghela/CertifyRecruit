<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Toggle Button -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>
    
    <!-- User Info and Sign Out Dropdown -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img src="{{url('storage/images/user_icon.png')}}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">Hi, {{ $user->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right custom-dropdown">
                <span class="dropdown-item dropdown-header">{{ $user->name }}</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item custom-dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i> Sign out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>