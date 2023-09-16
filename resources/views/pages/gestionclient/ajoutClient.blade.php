@extends("layouts.app")

@section("content-app")

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ajout un client</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Formulaire pour ajouté un client
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
                                <form action="{{ route("ajoutClient") }}" method="post">
                                    @csrf
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="nom">Nom <span class="input-required">*</span></label>
                                            <input class="form-control" type="text" id="nom" name="nom" value="{{ old("nom") }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="prenom">Prénom <span class="input-required">*</span></label>
                                            <input class="form-control" type="text" id="prenom" name="prenom" value="{{ old("prenom") }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="num_telephone">Numero téléphone <span class="input-required">*</span></label>
                                            <div class="identification">
                                                <select class="form-control form-size-control-1" name="code_telephonique1">
                                                    @foreach ($liste_code_telephonique as $cle_code_telephonique => $valeur_code_telephonique)
                                                        <option value="{{ $valeur_code_telephonique }}" @if($valeur_code_telephonique == 261) selected @endif>+{{ $valeur_code_telephonique }} &emsp;&emsp;&emsp;{{ $cle_code_telephonique }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="num_telephone-1">
                                                <input class="form-control" type="number" id="num_telephone" name="num_telephone1" value="{{ old("num_telephone1") }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="adresse">Adresse <span class="input-required">*</span></label>
                                            <textarea class="form-control" rows="2" name="adresse" >{{ old("adresse") }}</textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Valider</button>
                                        <a href="{{ route("pages.gestionclient.listeClient") }}" class="btn btn-danger"><i class="fa fa-remove"></i> Annuler</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="cin">Cin <span class="input-required">*</span></label>
                                            <input class="form-control" type="number" id="cin" name="cin" value="{{ old("cin") }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="genre">Genre <span class="input-required">*</span></label>
                                            <select class="form-control" id="genre" name="genre">
                                                <option value="#" selected disabled>-- Séléctionner --</option>
                                                <option value="Homme" @if(old("genre") == "Homme") selected @endif>Homme</option>
                                                <option value="Femme" @if(old("genre") == "Femme") selected @endif>Femme</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="num_telephone2">Numero téléphone <span class="input-required"></span></label>
                                            <div class="identification">
                                                <select class="form-control form-size-control-1" name="code_telephonique2">
                                                    @foreach ($liste_code_telephonique as $cle_code_telephonique => $valeur_code_telephonique)
                                                        <option value="{{ $valeur_code_telephonique }}" @if($valeur_code_telephonique == 261) selected @endif>+{{ $valeur_code_telephonique }} &emsp;&emsp;&emsp;{{ $cle_code_telephonique }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="num_telephone-2">
                                                <input class="form-control" type="number" id="num_telephone2" name="num_telephone2" value="{{ old("num_telephone2") }}">
                                            </div>
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