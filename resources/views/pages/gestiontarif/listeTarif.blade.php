@extends("layouts.app")

@section("content-app")

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Liste des tarifs</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Liste des tarifs prénumums
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                @foreach ($listeTarif as $tarif)
                                    <div class="col-sm-3">
                                        <div class="hero-widget well well-sm">
                                            <div class="icon">
                                                <i class="fa fa-tags"></i>
                                            </div>
                                            <div class="text">
                                                <label class="text-muted">{{ $tarif->getLieuDepart() }} - {{ $tarif->getLieuArrive() }}</label>
                                            </div>
                                            <div class="options">
                                                <a class="btn btn-primary btn-lg"><i class="fa fa-money"></i> {{ number_format($tarif->getMontantTarif(), '2', ',', ' ') }} Ar</a>
                                            </div>
                                        </div>
                                    </div>  
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection