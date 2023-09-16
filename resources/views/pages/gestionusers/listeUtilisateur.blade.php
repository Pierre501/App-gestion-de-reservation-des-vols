@extends("layouts.app")

@section("content-app")

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste des utilisateurs</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
    
                        <!-- Modal désactivé compte non validé-->
                        <div class="modal fade" id="desactiveCompte" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <form action="{{ route("desactiveUtilisateur") }}" method="POST">
                                        @csrf
                                        <div class="modal-header">
                                            <button type="button" id="desactive_close" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <h4>Voulez vous vraiment désactivé le compte qui porte le nom <span id="desactive_label" class="texte-label"></span> ?</h4>
                                                <input type="hidden" id="desactive_users_id" name="users_id" value="">
                                                <button type="submit" class="btn btn-primary button-size"> Oui</button>
                                                <a href="#" class="btn btn-danger button-size" id="desactive_close" data-dismiss="modal"> Non</a>
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
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($listeUser as $user)
                                            <tr>
                                                <td><img src="{{ asset("images/pic-4.png") }}" alt="Photo"></td> 
                                                <td class="py-1">{{ $user->getFirstName() }}</td>
                                                <td class="py-1">{{ $user->getLastName() }}</td>
                                                <td class="py-1"><i class="etat-user fa fa-toggle-on" id="desactive_users" value="{{ $user->getId() }}" data-toggle="modal" data-target="#desactiveCompte"></i> Oui</td>
                                                <td><a href="{{ route("pageModificationUtilisateur", ["id" => $user->getId()]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Modifier</a></td>
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