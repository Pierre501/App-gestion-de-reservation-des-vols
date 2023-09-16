@extends("layouts.app")

@section("content-app")

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Ajout un tarif de type {{ strtolower($simpleTypeTarif->getTypeTarif()) }}</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Formulaire pour ajouté un tarif de type {{ strtolower($simpleTypeTarif->getTypeTarif()) }}
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
                                <form action="{{ route("ajoutTarifAdmin") }}" method="post">
                                    @csrf
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="lieu_depart">Lieu de départ <span class="input-required">*</span></label>
                                            <input class="form-control" type="text" id="lieu_depart" name="lieu_depart" value="{{ old("lieu_depart") }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="montant_tarif">Montant du tarif <span class="input-required">*</span></label>
                                            <input class="form-control" type="number" id="montant_tarif" name="montant_tarif" value="{{ old("montant_tarif") }}" required>
                                        </div>
                                        <input type="hidden" name="type_tarifs_id" value="{{ $simpleTypeTarif->getId() }}">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Valider</button>
                                        <a href="{{ route("pageListeTarifAdmin", ["id"=>$simpleTypeTarif->getId()]) }}" class="btn btn-danger"><i class="fa fa-remove"></i> Annuler</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="lieu_arrive">Lieu d'arrivé <span class="input-required">*</span></label>
                                            <input class="form-control" type="text" id="lieu_arrive" name="lieu_arrive" value="{{ old("lieu_arrive") }}" required>
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