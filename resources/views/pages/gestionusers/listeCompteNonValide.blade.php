@extends("layouts.app")

@section("content-app")

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste des utilisateurs qui ne sont pas encors validés</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        
                        <!-- Modal confirmation compte non validé-->
                        <div class="modal fade" id="confirmationCompte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <form action="{{ route("confirmeUtilisateur") }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <button type="button" id="confirmation_close" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <h4>Voulez vous vraiment activé le compte qui porte le nom <span id="confirm_label" class="texte-label"></span> ?</h4>
                                                <input type="hidden" id="confirm_users_id" name="users_id" value="">
                                                <button type="submit" class="btn btn-primary button-size"> Oui</button>
                                                <a href="#" class="btn btn-danger button-size" id="confirmation_close" data-dismiss="modal"> Non</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
    
                        <!-- Modal confirmation compte non validé-->
                        <div class="modal fade" id="suppressionCompte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <form action="{{ route("deleteUtilisateur") }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <button type="button" id="suppression_close" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <h4>Voulez vous vraiment supprimé le compte qui porte le nom <span id="delete_label" class="texte-label"></span> ?</h4>
                                                <input type="hidden" id="delete_users_id" name="users_id" value="">
                                                <button type="submit" class="btn btn-primary button-size"> Oui</button>
                                                <a href="#" class="btn btn-danger button-size" id="suppression_close" data-dismiss="modal"> Non</a>
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
                                            <th>Photo</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>
                                            <th>Actif</th>
                                            <th>Date de création</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listeUser as $user)
                                            <tr>
                                                <td><img src="{{ asset("images/pic-4.png") }}" alt="Photo"></td>  
                                                <td class="py-1">{{ $user->getFirstName() }}</td>  
                                                <td class="py-1">{{ $user->getLastName() }}</td>
                                                <td class="py-1"><i class="etat-user fa fa-toggle-off" id="confirm_user" value="{{ $user->getId() }}" data-toggle="modal" data-target="#confirmationCompte"></i> Non</td>  
                                                <td class="py-1">{{ $user->getDateCreation() }}</td> 
                                                <td><a href="#" class="btn btn-danger" id="delete_user" value="{{ $user->getId() }}" data-toggle="modal" data-target="#suppressionCompte"><i class="fa fa-trash-o"></i> Supprimer</a></td> 
                                            </tr> 
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="pagination-table">
                                    {{ $paginationListeUser->links('pages.vendor.pagination.bootstrap-4') }}
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