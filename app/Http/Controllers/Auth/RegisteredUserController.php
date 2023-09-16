<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $tittle = "Inscription utilisateur";
        return view('auth.register', compact("tittle"));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $instanceUser = new User();
        $instanceUser->setFirstName(strtoupper($request->first_name));
        $instanceUser->setLastName(ucwords($request->last_name));
        $instanceUser->setEmail($request->email);
        $instanceUser->setEtat("Non validé");
        $instanceUser->setIdRole(2);
        $instanceUser->setPassword(Hash::make($request->password));
        $instanceUser->insertionUser();
        return redirect()->route("login");
    }
}
