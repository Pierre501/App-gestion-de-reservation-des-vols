<div class="navbar-header">
    <a class="navbar-brand" href="index.html">Réservation de vol</a>
</div>

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>

<ul class="nav navbar-nav navbar-left navbar-top-links">
    <li><a href="#"><i class="fa fa-home fa-fw"></i> Application web</a></li>
</ul>

<ul class="nav navbar-right navbar-top-links">
    <li class="dropdown navbar-inverse">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
        </a>
    </li>
    <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <i class="fa fa-user fa-fw"></i> {{ Auth::user()->last_name }} <b class="caret"></b>
        </a>
        <ul class="dropdown-menu dropdown-user">
            <li><a href="#"><i class="fa fa-user fa-fw"></i> Profile</a>
            </li>
            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Paramètre</a>
            </li>
            <li class="divider"></li>
            <li>
                <a href="{{ route("logout") }}"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
            </li>
        </ul>
    </li>
</ul>
<!-- /.navbar-top-links -->