@extends("layouts.guest")

@section('content-guest')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="login-panel panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title tittle-login">Se connecter</h3>
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
                @if (session()->has("error_login"))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        {{ session()->get("error_login") }}
                    </div>
                @endif
                <form action="{{ route("login") }}" method="post">
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <label for="emal">Adresse e-mail</label>
                            <input class="form-control" id="email" name="email" type="email" value="{{ old("email") }}" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input class="form-control" id="password" name="password" type="password" value="{{ old("password") }}" required>
                            <div class="icons-password">
                                <i id="icon-password" class="fa fa-eye-slash"></i>
                            </div>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value="Remember Me">Souviens moi
                                <a href="{{ route("password.request") }}" class="forgot-password">Mot de passe oublié ?</a>
                            </label>
                        </div>
                        <button type="submit" class="btn btn-lg btn-browse btn-block">Connexion</button>
                        <a href="{{ route("register") }}" class="btn btn-lg btn-blue btn-block">Créer un compte</a>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
