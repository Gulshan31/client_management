<nav class="header-navbar navbar-expand-lg navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-dark navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header expanded">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-lg-none mr-auto">
                    <a class="nav-link nav-menu-main menu-toggle hidden-xs waves-effect waves-dark is-active" href="#"><i class="ft-menu font-large-1"></i></a>
                </li>

                <li class="nav-item mr-auto">
                    <a class="navbar-brand waves-effect waves-dark" href="{{url('/')}}">
                        <img class="brand-logo" alt="Biorev" src="{{asset('cms/img/logo_circle.png')}}" />
                        <h3 class="brand-text">Biorev</h3>
                    </a>
                </li>

                <li class="nav-item d-none d-lg-block nav-toggle">
                    <a class="nav-link modern-nav-toggle pr-0 waves-effect waves-dark" data-toggle="collapse"><i class="toggle-icon font-medium-3 white ft-toggle-right" data-ticon="ft-toggle-right"></i></a>
                </li>

                <li class="nav-item d-lg-none">
                    <a class="nav-link open-navbar-container waves-effect waves-dark" data-toggle="collapse" data-target="#navbar-mobile"><i class="material-icons mt-1">more_vert</i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div
    class="main-menu material-menu menu-fixed menu-dark menu-accordion menu-shadow expanded"
    data-scroll-to-active="true"
    style="touch-action: none; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"
>
    <div class="main-menu-content ps" style="height: 100% !important; overflow-y: auto !important;">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" style="font-weight: 600;">
            <li class="navigation-header">
                <span data-i18n="nav.category.admin-panels">Admin Panels</span><i class="material-icons nav-menu-icon" data-toggle="tooltip" data-placement="right" data-original-title="Admin Panels">more_horiz</i>
            </li>
            <li class="nav-item {{($menu =='dashboard')?'active':''}} ">
                <a href="{{route('dashboard')}}" class="waves-effect waves-dark"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="">Dashboard</span></a>
            </li>
            <li class="nav-item {{($menu =='clients')?'active':''}} ">
                <a href="" class="waves-effect waves-dark"><i class="material-icons">account_box</i><span class="menu-title" data-i18n="">Clients</span></a>
            </li>
            <li class="nav-item {{($menu =='projects')?'active':''}} ">
                <a href="{{route('project')}}" class="waves-effect waves-dark"><i class="material-icons">topic</i><span class="menu-title" data-i18n="">Projects</span></a>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->

            <li class="nav-item {{($menu =='settings')?'active':''}} ">
                <a href="" class="waves-effect waves-dark"><i class="material-icons">settings</i><span class="menu-title" data-i18n="">Settings</span></a>
            </li>
        </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 264px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
        </div>
    </div>
</div>
