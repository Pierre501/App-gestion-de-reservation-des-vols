@extends("layouts.app")

@section("content-app")

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste des clients</h1>
            <div class="modal fade" id="infosClient" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" id="infos_close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Infos sur <span id="infos_label" class="texte-label"></span></h4>
                        </div>
                        <div class="modal-body">
                            <div class="infos_client">
                                <div class="infos_client_img" id="infos_client_img">
                                    <div id="photo_client">
                                        <img src="{{ asset("images/pic-4.png") }}">
                                    </div>
                                </div>
                                <div class="infos_client_infos">
                                    <div>
                                        <label for="#">Numéro cin : </label>
                                        <span id="cin"></span>
                                    </div>
                                    <div>
                                        <label for="#">Genre : </label>
                                        <span id="genre"></span>
                                    </div>
                                    <div>
                                        <label for="#">Numéro téléphone n°1 : </label>
                                        <span id="num1"></span>
                                    </div>
                                    <div>
                                        <label for="#">Numéro téléphone n°2 : </label>
                                        <span id="num2"></span>
                                    </div>
                                    <div>
                                        <label for="#">Adresse : </label>
                                        <span id="adresse"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="infos_close" data-dismiss="modal"><i class="fa fa-remove"></i> Fermer</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
    
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Numéro téléphone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listeClient as $client)
                                            <tr>
                                                @if ($client->getGenre() == "Homme")
                                                    <td><img src="{{ asset("images/pic-4.png") }}"></td>
                                                @else
                                                    <td><img src="{{ asset("images/pic-2.png") }}"></td>
                                                @endif
                                                <td class="py-1">{{ $client->getNom() }}</td>
                                                <td class="py-1">{{ $client->getPrenom() }}</td>
                                                <td class="py-1">{{ $client->formaterNumeroTelephone($client->getCodeTelephonique1(), $client->getNumeroTelephone1()) }}</td>
                                                <td>
                                                    <a href="#" id="infos_client" class="btn btn-success" data-toggle="modal" data-target="#infosClient" value="{{ $client->getId() }}"><i class="fa fa-eye"></i> Voir plus</a> 
                                                    <a href="{{ route("pageModificationClient", ["id" => $client->getId()]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Modifier</a>
                                                @can("access-admin")
                                                    <a href="#" class="btn btn-danger"><i class="fa fa-trash-o"></i> Supprimer</a>  
                                                @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-table">
                                    {{ $paginationListeClient->links('pages.vendor.pagination.bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection