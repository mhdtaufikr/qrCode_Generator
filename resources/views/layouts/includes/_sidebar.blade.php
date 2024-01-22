<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <!-- Sidenav Menu Heading (Core)-->
                <div class="sidenav-menu-heading">Core</div>
                <!-- Sidenav Link (Charts)-->
                <a class="nav-link" href="{{url('/home')}}">
                    <div class="nav-link-icon"><i class="fas fa-fw fa-home"></i></div>
                    Home
                </a>


                @if(\Auth::user()->role === 'Super Admin')
                
                <!-- Sidenav Menu Heading (Core)-->
                <div class="sidenav-menu-heading">Configuration</div>
                <!-- Sidenav Accordion (Utilities)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                    <div class="nav-link-icon"><i data-feather="tool"></i></div>
                    Master Configuration
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseUtilities" data-bs-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav">
                        <a class="nav-link" href="{{url('/dropdown')}}">Dropdown</a>
                        <a class="nav-link" href="{{url('/rule')}}">Rules</a>
                        <a class="nav-link" href="{{url('/user')}}">User</a>
                    </nav>
                </div>
                @endif

            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{ auth()->user()->name }}</div>
            </div>
        </div>
    </nav>
</div>
