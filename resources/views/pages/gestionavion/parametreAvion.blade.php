@extends("layouts.app")

@section("content-app")

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Liste classe et modèle des avions</h1>
            <div class="panel tabbed-panel panel-default">
                <div class="panel-heading clearfix">
                    <div class="panel-title pull-left"> Menu</div>
                    <div class="pull-right">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-default-1" data-toggle="tab"> Liste du modèle des avions</a></li>
                            <li><a href="#tab-default-2" data-toggle="tab"> Liste de la classe des avions</a></li>
                        </ul>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab-default-1">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Modèle avion</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($listeModeleAvion as $modeleAvion)
                                                            <tr>
                                                                <td>{{ $modeleAvion->getNomModele() }}</td>
                                                                <td>
                                                                    <a href="{{ route("pageModifModeleAvion", ["id" => $modeleAvion->getId()]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Modifier</a>
                                                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash-o"></i> Supprimer</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="pagination-table">
                                                    {{ $paginationListeModeleAvion->links('pages.vendor.pagination.bootstrap-4') }}
                                                </div>
                                            </div>
                                            <a href="{{ route("pageAjoutModeleAvion") }}" class="btn btn-browse"><i class="fa fa-plus"></i> Ajouter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-default-2">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Classe avion</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($listeClasseAvion as $classeAvion)
                                                            <tr>
                                                                <td>{{ $classeAvion->getNomClasse() }}</td>
                                                                <td>
                                                                    <a href="{{ route("pageModifClasseAvion", ["id" => $classeAvion->getId()]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Modifier</a>
                                                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash-o"></i> Supprimer</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <div class="pagination-table">
                                                    {{ $paginationListeClasseAvion->links('pages.vendor.pagination.bootstrap-4') }}
                                                </div>
                                            </div>
                                            <a href="{{ route("pageAjoutClasseAvion") }}" class="btn btn-browse"><i class="fa fa-plus"></i> Ajouter</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.panel -->
        </div>
    </div>
</div>
@endsection