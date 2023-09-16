<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li>
                <a href="{{ route("home") }}" class="@if(str_contains(Route::current()->getName(), "home")) {{ "active" }} @endif"><i class="fa fa-home fa-fw"></i> Accueil</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-user-plus fa-fw"></i> Client<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route("pages.gestionclient.ajoutClient") }}" class="@if(str_contains(Route::current()->getName(), "pages.gestionclient.ajoutClient")) {{ "active" }} @endif"><i class="fa fa-plus"></i> Ajout</a>
                    </li>
                    <li>
                        <a href="{{ route("pages.gestionclient.listeClient") }}" class="@if(str_contains(Route::current()->getName(), "pages.gestionclient.listeClient")) {{ "active" }} @endif"><i class="fa fa-table"></i> Liste</a>
                    </li>
                </ul>
            </li>
            @can("access-admin")
            <li>
                <a href="#"><i class="fa fa-edit fa-fw"></i> Avion<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route("pageAjoutAvion") }}" class="@if(str_contains(Route::current()->getName(), "pageAjoutAvion")) {{ "active" }} @endif"><i class="fa fa-plus"></i> Ajout</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i> Liste</a>
                    </li>
                    <li>
                        <a href="{{ route("pageParametreAvion") }}" class="@if(str_contains(Route::current()->getName(), "pageParametreAvion")) {{ "active" }} @endif"><i class="fa fa-gear"></i> Modèle et classe</a>
                    </li>
                </ul>
            </li>
            @endcan
            <li>
                <a href="#"><i class="fa fa-edit fa-fw"></i> Tarif<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route("pageListeTarif") }}" class="@if(str_contains(Route::current()->getName(), "pageListeTarif")) {{ "active" }} @endif"><i class="fa fa-table"></i> Liste</a>
                    </li>
                </ul>
            </li>
            @can("access-admin")
            <li>
                <a href="#"><i class="fa fa-edit fa-fw"></i> Vol<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#"><i class="fa fa-plus"></i> Ajout</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i> Liste</a>
                    </li>
                </ul>
            </li>
            @endcan
            <li>
                <a href="#"><i class="fa fa-edit fa-fw"></i> Réservation<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#"><i class="fa fa-plus"></i> Ajout</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-table"></i> Liste</a>
                    </li>
                </ul>
            </li>
            @can("access-admin")
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Autre<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route("pageListeTypeTarifAdmin") }}" class="@if(str_contains(Route::current()->getName(), "pageListeTypeTarifAdmin")) {{ "active" }} @endif"><i class="fa fa-tags"></i> Liste tarif</a>
                    </li>
                    <li>
                        <a href="{{ route("pages.gestionusers.listeUtilisateur") }}" class="@if(str_contains(Route::current()->getName(), "pages.gestionusers.listeUtilisateur")) {{ "active" }} @endif"><i class="fa fa-user"></i> Liste utilisateur</a>
                    </li>
                    <li>
                        <a href="{{ route("pages.gestionusers.listeCompteNonValide") }}" class="@if(str_contains(Route::current()->getName(), "pages.gestionusers.listeCompteNonValide")) {{ "active" }} @endif"><i class="fa fa-user-times"></i> Liste compte non validé</a>
                    </li>
                    <li>
                        <a href="{{ route("tableauDeBord") }}" class="@if(str_contains(Route::current()->getName(), "tableauDeBord")) {{ "active" }} @endif"><i class="fa fa-dashboard"></i> Tableau de bord</a>
                    </li>
                </ul>
            </li>
            @endcan
        </ul>
    </div>
</div>