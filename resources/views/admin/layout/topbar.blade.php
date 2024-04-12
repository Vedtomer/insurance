<div class="app-header header-shadow d-flex">
    <div class="app-header__logo">
        <div class="logo-src">
            <img src="{{ asset('images/logo.png') }}" style="height: auto; width: 200px; "  alt="">
        </div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                    data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
 
    <div class="app-header-left ml-5" style="float: left">
        <div class="dropdown" style="float: left">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="simpleDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom">
                <i class="fa fa-star"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="simpleDropdown">
                <!-- Dropdown items -->
                <a href="change-password"><button type="button" tabindex="0" class="dropdown-item">Change Password</button></a>
                <a href="{{ URL::to(Auth::guard('admin')->check() ? 'admin/logout' : 'logout') }}"><button type="button" tabindex="0" class="dropdown-item">Logout</button></a>
            </div>
        </div>
    </div>
    </div>
