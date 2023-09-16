<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function pageLogin()
    {
        $tittle = "Authentification";
        return view("auth.login", compact("tittle"));
    }

    public function pageHome()
    {
        $tittle = "Accueil";
        return view("pages.home", compact("tittle"));
    }
}
