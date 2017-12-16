<div id="navbar-wrapper">
        <header>
            <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                
            </nav>
        </header>
    </div>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <aside id="sidebar">
                <ul id="sidemenu" class="sidebar-nav">
                    <li>
                        <a href="{{ route('fixtures') }}">
                            <span class="sidebar-icon"><i class="fa fa-dashboard"></i></span>
                            <span class="sidebar-title">Matches</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('teams') }}">
                            <span class="sidebar-icon"><i class="fa fa-users"></i></span>
                            <span class="sidebar-title">Teams</span>
                        </a>
                        <ul id="submenu-2" class="panel-collapse collapse panel-switch" role="menu">
                            <li><a href="#"><i class="fa fa-caret-right"></i>Users</a></li>
                            <li><a href="#"><i class="fa fa-caret-right"></i>Roles</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('players') }}">
                            <span class="sidebar-icon"><i class="fa fa-newspaper-o"></i></span>
                            <span class="sidebar-title">Players</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('bets') }}">
                            <span class="sidebar-icon"><i class="fa fa-newspaper-o"></i></span>
                            <span class="sidebar-title">Bet</span>
                        </a>
                    </li>
                     <!-- ADMIN -->
                     @if( \Request::get('isAdmin')== 1)
                     
                     <li>
                        <a class="accordion-toggle collapsed toggle-switch" data-toggle="collapse" href="#submenu-3">
                            <span class="sidebar-icon"><i class="fa fa-newspaper-o"></i></span>
                            <span class="sidebar-title">Admin</span>
                            <b class="caret"></b>
                        </a>
                        <ul id="submenu-3" class="panel-collapse collapse panel-switch" role="menu">
                            <li><a href="/fixtures/manage">Manage Matches</a></li>
                            <li><a href="/teams/manage">Manage Teams</a></li>
                            <li><a href="/players/manage">Manage Players</a></li>
                            <li><a href="/bets/show">Manage Bets</a></li>
                            <li><a href="/orders">Orders</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </aside>            
        </div>