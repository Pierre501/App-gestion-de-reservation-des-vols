@extends("layouts.app")

@section("content-app")

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Modification d'une classe avion</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Formulaire pour modifié une classe avion
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
                                <form action="{{ route("modifClasseAvion") }}" method="post">
                                    @csrf
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="nom_classe">Nom de la classe <span class="input-required">*</span></label>
                                            <input type="hidden" name="classe_avions_id" value="{{ $simpleClasseAvion->getId() }}">
                                            <input class="form-control" type="text" id="nom_classe" name="nom_classe" value="{{ $simpleClasseAvion->getNomClasse() }}" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Valider</button>
                                        <a href="{{ route("pageParametreAvion") }}" class="btn btn-danger"><i class="fa fa-remove"></i> Annuler</a>
                                    </div>
                                    <div class="col-lg-6"></div>
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