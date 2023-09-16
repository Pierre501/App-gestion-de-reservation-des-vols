@extends("layouts.app")

@section("content-app")

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Modification d'un utilisateur</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Information sur l'utilisateur
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                @if($errors->any())
                                    <div class= "alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        @foreach($errors->all() as $error)
                                            <h5>{{ $error }}</h5>
                                        @endforeach
                                    </div>
                                @endif
                                <form action="{{ route("modificationUtilisateur") }}" method="post">
                                    @csrf
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="nom">Nom <span class="input-required">*</span></label>
                                            <input class="form-control" type="text" id="nom" name="nom" value="{{ $simpleUser->getFirstName() }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="prenom">Prénom <span class="input-required">*</span></label>
                                            <input class="form-control" type="text" id="prenom" name="prenom" value="{{ $simpleUser->getLastName() }}" required>
                                        </div>
                                        <input type="hidden" name="users_id" value="{{ $simpleUser->getId() }}">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Valider</button>
                                        <a href="{{ route("pages.gestionusers.listeUtilisateur") }}" class="btn btn-danger"><i class="fa fa-remove"></i> Annuler</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="email">Email <span class="input-required"></span></label>
                                            <input class="form-control" type="email" id="email" name="email" value="{{ $simpleUser->getEmail() }}" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="role">Rôle <span class="input-required">*</span></label>
                                            <select class="form-control" id="role" name="role" required>
                                                @foreach ($listeRole as $role)
                                                    <option value="{{ $role->getId() }}" @if($role->getId() == $simpleUser->getIdRole()) selected @endif>{{ $role->getRole() }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection