<style>
    .logo-src {
        /* display: flex;
        justify-content: center;
        align-items: center; */
    }
</style>
<div class="app-header header-shadow">
    
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
    
    <div class="app-header__mobile-menu mr-5">
        <div class="mr-5">
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
     
    </div>
    <div class="dropdown m ml-5 ">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="simpleDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom"
        class="btn-shadow mr-3 btn btn-dark">
        <i class="fa fa-star"></i>
        </button>
        <div class="dropdown-menu" aria-labelledby="simpleDropdown">
            <!-- Dropdown items -->
              <a href="change-password"><button type="button" tabindex="0"
                    class="dropdown-item">change password</button></a>
            <a href="{{ URL::to(Auth::guard('admin')->check() ? 'admin/logout' : 'logout') }}">
                <button type="button" tabindex="0" class="dropdown-item">Logout</button>
            </a>
        </div>
    </div>
   
    
   
      
        

</div>
