<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
        <a class="sidebar-brand brand-logo" href="{{ route('dashboard.index') }}"><img
                src="{{ asset('assets/images/logo.svg') }}" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="index.html"><img
                src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile" />
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column pr-3">
                    <span class="font-weight-medium mb-2">{{ Auth::user()->name }}</span>
                    <span
                        class="font-weight-normal badge badge-danger">{{ Auth::user()->getRoleNames()->first() }}</span>
                </div>

            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard.index') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-table-large menu-icon"></i>
                <span class="menu-title">Todos</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('boards.index') }}">Boards</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('boards.create') }}">New Board</a>
                    </li>

                </ul>
            </div>
        </li>



        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic0" aria-expanded="false" aria-controls="ui-basic0">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Setting</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic0">
                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logs.index') }}">Log</a>
                    </li>

                </ul>
            </div>
        </li>



        <li class="nav-item">
            <a class="nav-link"  href="{{route('payment.index')}}">
                <i class="mdi mdi-coffee menu-icon"></i>
                <span class="menu-title">Buy me a coffe</span>
            </a>
        </li>



        @hasrole('admin')
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false"
                    aria-controls="ui-basic2">
                    <i class="mdi mdi-contacts menu-icon"></i>
                    <span class="menu-title">Admin</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-basic2">
                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('reviews.index') }}">Review</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logs.show') }}">Log</a>
                        </li>
                    </ul>
                </div>
            </li>
        @endhasrole



        <li class="nav-item sidebar-actions">
            <div class="nav-link">
                <ul class="mt-4 pl-0">
                    <li>Support</li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
