@extends("layouts.app")

@section("content-app")

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Modification tarif de type {{ strtolower($simpleTypeTarif->getTypeTarif()) }}</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Formulaire pour modifié un tarif de type {{ strtolower($simpleTypeTarif->getTypeTarif()) }}
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
                                <form action="{{ route("modificationTarifAdmin") }}" method="post">
                                    @csrf
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="lieu_depart">Lieu de départ <span class="input-required">*</span></label>
                                            <input class="form-control" type="text" id="lieu_depart" name="lieu_depart" value="{{ $simpleTarif->getLieuDepart() }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="montant_tarif">Montant du tarif <span class="input-required">*</span></label>
                                            <input class="form-control" type="number" id="montant_tarif" step="any" name="montant_tarif" value="{{ $simpleTarif->getMontantTarif() }}" required>
                                        </div>
                                        <input type="hidden" name="tarifs_id" value="{{ $simpleTarif->getId() }}">
                                        <input type="hidden" name="type_tarifs_id" value="{{ $simpleTypeTarif->getId() }}">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Valider</button>
                                        <a href="{{ route("pageListeTarifAdmin", ["id"=>$simpleTypeTarif->getId()]) }}" class="btn btn-danger"><i class="fa fa-remove"></i> Annuler</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="lieu_arrive">Lieu d'arrivé <span class="input-required">*</span></label>
                                            <input class="form-control" type="text" id="lieu_arrive" name="lieu_arrive" value="{{ $simpleTarif->getLieuArrive() }}" required>
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