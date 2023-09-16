@extends("layouts.app")

@section("content-app")

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste des types tarifs</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
    
                        <!-- Modal suppression type tarif-->
                        <div class="modal fade" id="suppressionTypeTarif" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <form action="{{ route("suppressionTypeTarif") }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <button type="button" id="type_tarif_close" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <h4>Voulez vous vraiment supprimé le type tarif <span id="type_tarif_label" class="texte-label"></span> ?</h4>
                                                <input type="hidden" id="type_tarifs_id" name="type_tarifs_id" value="">
                                                <button type="submit" class="btn btn-primary button-size"> Oui</button>
                                                <a href="#" class="btn btn-danger button-size" id="type_tarif_close" data-dismiss="modal"> Non</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Type tarif</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listeTypeTarif as $typeTarif)
                                            <tr>
                                                <td>{{ $typeTarif->getTypeTarif() }}</td>
                                                <td>
                                                    <a href="{{ route("pageListeTarifAdmin", ["id" => $typeTarif->getId()]) }}" class="btn btn-success"><i class="fa fa-eye"></i> Voir plus</a> 
                                                    <a href="{{ route("pageModificationTypeTarif", ["id" => $typeTarif->getId()]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Modifier</a>
                                                    <a href="#" class="btn btn-danger" id="type_tarifs" value="{{ $typeTarif->getId() }}" data-toggle="modal" data-target="#suppressionTypeTarif"><i class="fa fa-trash-o"></i> Supprimer</a>  
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route("pageAjoutTypeTarif") }}" class="btn btn-browse"><i class="fa fa-plus"></i> Ajouter</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection