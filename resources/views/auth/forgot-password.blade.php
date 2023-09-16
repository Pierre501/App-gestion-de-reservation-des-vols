@extends("layouts.guest")

@section('content-guest')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title tittle-login">Mot de passe oublié</h3>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <div>
                                <p>Mot de passe oublié ? Aucun problème. Indiquez-nous simplement votre adresse e-mail et nous vous enverrons par e-mail un lien de réinitialisation de mot de passe qui vous permettra d'en choisir un nouveau.</p>
                            </div>
                            <label for="emal">Adresse email</label>
                            <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" required autofocus>
                        </div>
                        <button type="submit" class="btn btn-lg btn-browse btn-block">Envoyer</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
