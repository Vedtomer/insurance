
<div class="app-sidebar sidebar-shadow">
    {{-- <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div> --}}
    {{-- <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div> --}}
    {{-- <div class="app-header__menu">
        <span>
            {{-- <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    {{-- <i class="fa fa-ellipsis-v fa-w-6"></i> --}}
                {{-- </span> --}}
            </button>
        </span>
    {{-- </div>    --}}
     <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                {{-- <li class="app-sidebar__heading"></li> --}}
                <li>
                    {{-- class="mm-active" --}}
                    <a href="{{route('admin.dashboard')}}" >   
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Dashboard
                    </a>
                </li>
                {{-- <li>
                    <a href="" >
                        <i class="metismenu-icon pe-7s-rocket"></i>
                        Home
                    </a>
                </li> --}}
                <li>
                    <a href="{{route('agent.list')}}">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Agent List
                    </a>
                </li>
               
                <li>
                    <a href="{{route('upload.policy')}}">
                        <i class="metismenu-icon pe-7s-graph2"></i>
                        Upload Policy
                    </a>
                </li>
                <li>
                    <a href="{{route('commission.code')}}">
                        <i class="metismenu-icon pe-7s-diamond"></i>
                        Commission Code
                        
                    </a>
                </li>
                   <li>
                    <a href="{{ route('policy.list') }}">
                        <i class="metismenu-icon pe-7s-eyedropper">
                        </i>Policy List
                    </a>
                </li>


                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-eyedropper">
                        </i>Points
                    </a>
                </li>

                <ul>
                    
                    <li>
                        <a href="{{ route('points.redem.request') }}">
                            <i class="metismenu-icon pe-7s-eyedropper">
                            </i>Redem  Request
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('points.index') }}">
                            <i class="metismenu-icon pe-7s-eyedropper">
                            </i>Redem Proceeded
                        </a>
                    </li>
                </ul>

                {{-- <li>
                    <a href="shriramgi">
                        <i class="metismenu-icon pe-7s-display2"></i>
                        Shriramgi
                    </a>
                </li> --}}
                    {{-- <ul>
                        <li>
                            <a href="elements-buttons-standard.html">
                                {{-- <i class="metismenu-icon"></i> --}}
                                {{-- Buttons
                            </a> --}}
                        {{-- </li> --}}
                       
                    
                    <li>
                        <a href="{{ route('transaction') }}">
                            <i class="metismenu-icon pe-7s-display2"></i>
                            Transaction
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('policy.pdf.upload') }}">
                            <i class="metismenu-icon pe-7s-diamond">
                            </i>file Upload
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('sliders.index') }}">
                            <i class="metismenu-icon pe-7s-diamond">
                            </i>App Slider
                        </a>
                    </li>
                {{-- <li>
                    <a href="">
                        <i class="metismenu-icon pe-7s-car"></i>
                        Components --}}
                        {{-- <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i> --}}
                    {{-- </a> --}}
                    {{-- <ul>
                        <li>
                            <a href="components-tabs.html">
                                <i class="metismenu-icon">
                                </i>Tabs
                            </a>
                        </li>
                        <li>
                            <a href="components-accordions.html">
                                <i class="metismenu-icon">
                                </i>Accordions
                            </a>
                        </li>
                        <li>
                            <a href="components-notifications.html">
                                <i class="metismenu-icon">
                                </i>Notifications
                            </a>
                        </li>
                        <li>
                            <a href="components-modals.html">
                                <i class="metismenu-icon">
                                </i>Modals
                            </a>
                        </li>
                        <li>
                            <a href="components-progress-bar.html">
                                <i class="metismenu-icon">
                                </i>Progress Bar
                            </a>
                        </li>
                        <li>
                            <a href="components-tooltips-popovers.html">
                                <i class="metismenu-icon">
                                </i>Tooltips &amp; Popovers
                            </a>
                        </li>
                        <li>
                            <a href="components-carousel.html">
                                <i class="metismenu-icon">
                                </i>Carousel
                            </a>
                        </li>
                        <li>
                            <a href="components-calendar.html">
                                <i class="metismenu-icon">
                                </i>Calendar
                            </a>
                        </li>
                        <li>
                            <a href="components-pagination.html">
                                <i class="metismenu-icon">
                                </i>Pagination
                            </a>
                        </li>
                        <li>
                            <a href="components-scrollable-elements.html">
                                <i class="metismenu-icon">
                                </i>Scrollable
                            </a>
                        </li>
                        <li>
                            <a href="components-maps.html">
                                <i class="metismenu-icon">
                                </i>Maps
                            </a>
                        </li>
                    </ul> --}}
                {{-- </li>
              
                <li class="app-sidebar__heading"></li>
              --}}
                {{-- <li class="app-sidebar__heading">Forms</li> --}}
                {{-- <li>
                    <a href="">
                        <i class="metismenu-icon pe-7s-mouse">
                        </i>Forms Controls
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="metismenu-icon pe-7s-eyedropper">
                        </i>Forms Layouts
                    </a>
                </li>
                <li>
                    <a href="">
                        <i class="metismenu-icon pe-7s-pendrive">
                        </i>Forms Validation
                    </a>
                </li> --}}
                {{-- <li class="app-sidebar__heading">Charts</li> --}}
                {{-- <li>
                    <a href="">
                        <i class="metismenu-icon pe-7s-graph2">
                        </i>ChartJS
                    </a>
                </li>
                {{-- <li class="app-sidebar__heading">PRO Version</li> --}}
                {{-- <li>
                    <a href="https://dashboardpack.com/theme-details/architectui-dashboard-html-pro/" target="_blank">
                        <i class="metismenu-icon pe-7s-graph2">
                        </i>
                        Upgrade to PRO
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>  
