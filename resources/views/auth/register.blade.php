@extends("layouts.guest")

@section('content-guest')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title tittle-login">Inscription utilisateur</h3>
            </div>
            <div class="panel-body">
                @if($errors->any())
                    <div class= "alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        @foreach($errors->all() as $error)
                            <h5>{{ $error }}</h5>
                        @endforeach
                    </div>
                @endif
                <form action="{{ route("register") }}" method="post">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label for="first_name">Nom <span class="input-required">*</span></label>
                            <input class="form-control" name="first_name" type="text" id="first_name" value="{{ old("first_name") }}" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Prénom <span class="input-required">*</span></label>
                            <input class="form-control" name="last_name" type="text" id="last_name" value="{{ old("last_name") }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Adresse e-mail <span class="input-required">*</span></label>
                            <input class="form-control" type="email" name="email" id="email" value="{{ old("email") }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe <span class="input-required">*</span></label>
                            <input class="form-control" name="password" type="password" id="password" value="{{ old("password") }}" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirme mot de passe <span class="input-required">*</span></label>
                            <input class="form-control" name="password_confirmation" type="password" id="password_confirmation" value="{{ old("password_confirmation") }}" required>
                        </div>
                        <div class="checkbox">
                        <button type="submit" class="btn btn-lg btn-blue btn-block">Créer</button>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
