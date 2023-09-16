@extends("layouts.app")

@section("content-app")

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste des tarif {{ strtolower($simpleTypeTarif->getTypeTarif()) }}</h1>
            <div class="mt-10">
                <a href="{{ route("pageListeTypeTarifAdmin") }}" title="Retour" class="btn btn-default btn-circle"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="row row-style">
                <div class="col-lg-12">
                    <div class="panel panel-default">
    
                        <!-- Modal suppression tarif-->
                        <div class="modal fade" id="suppressionTarifs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <form action="{{ route("suppressionTarif") }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <button type="button" id="tarif_close" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <h4>Voulez vous vraiment supprimé le tarif <span id="tarif_label" class="texte-label"></span> ?</h4>
                                                <input type="hidden" id="tarifs_id" name="tarifs_id" value="">
                                                <button type="submit" class="btn btn-primary button-size"> Oui</button>
                                                <a href="#" class="btn btn-danger button-size" id="tarif_close" data-dismiss="modal"> Non</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Lieu de départ</th>
                                            <th>Lieu d'arrivé</th>
                                            <th>Montant</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listeTarif as $tarif)
                                            <tr>
                                                <td>{{ $tarif->getLieuDepart() }}</td>
                                                <td>{{ $tarif->getLieuArrive() }}</td>
                                                <td>{{ number_format($tarif->getMontantTarif(), '2', ',', ' ') }} Ar</td>
                                                <td>
                                                    <a href="{{ route("pageModificationTarifAdmin", ["id"=>$tarif->getId()]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Modifier</a>
                                                    <a href="#" value="{{ $tarif->getId() }}" class="btn btn-danger" id="tarifs" data-toggle="modal" data-target="#suppressionTarifs"><i class="fa fa-trash-o"></i> Supprimer</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route("pageAjoutTarifAdmin", ["id"=>$simpleTypeTarif->getId()]) }}" class="btn btn-browse"><i class="fa fa-plus"></i> Ajouter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection