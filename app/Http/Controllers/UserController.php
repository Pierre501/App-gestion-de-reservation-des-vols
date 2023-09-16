<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function pageListeUtilisateurNonValide()
    {
        $tittle = "Liste des utilisateurs non validé";
        $instanceUser = new User();
        $pagination = 5;
        $etat = "Non validé";
        $paginationListeUser = $instanceUser->getQeuryAllUsersAvecPagination($etat, $pagination);
        $listeUser = $instanceUser->getAllUserAvecPagination($etat, $pagination);
        return view("pages.gestionusers.listeCompteNonValide", compact("tittle", "listeUser", "paginationListeUser"));
    }

    public function pageListeUtilisateur()
    {
        $tittle = "Liste des utilisateurs";
        $instanceUser = new User();
        $pagination = 5;
        $etat = "Validé";
        $paginationListeUser = $instanceUser->getQeuryAllUsersAvecPagination($etat, $pagination);
        $listeUser = $instanceUser->getAllUserAvecPagination($etat, $pagination);
        return view("pages.gestionusers.listeUtilisateur", compact("tittle", "listeUser", "paginationListeUser"));
    }

    public function ajaxGetSimpleUser($id, $etat)
    {
        $instanceUser = new User();
        $instanceUser->setId($id);
        $simpleUser = $instanceUser->getSimpleUser($etat);
        echo json_encode($simpleUser);
    }

    public function confirmeUtilisateur(Request $request)
    {
        $userId = $request->users_id;
        $simpleUser = User::find($userId);
        $simpleUser->etat = "Validé";
        $simpleUser->update();
        return redirect()->route("pages.gestionusers.listeCompteNonValide");
    }

    public function desactiveUtilisateur(Request $request)
    {
        $userId = $request->users_id;
        $simpleUser = User::find($userId);
        $simpleUser->etat = "Non validé";
        $simpleUser->update();
        return redirect()->route("pages.gestionusers.listeUtilisateur");
    }

    public function deleteUtilisateur(Request $request)
    {
        $userId = $request->users_id;
        $simpleUser = User::find($userId);
        $simpleUser->delete();
        return redirect()->route("pages.gestionusers.listeCompteNonValide");
    }

    public function pageModificationUtilisateur($id)
    {
        $tittle = "Modification information d'utilisateur";
        $instanceRole = new Role();
        $listeRole = $instanceRole->getAllRole();
        $instanceUser = new User();
        $instanceUser->setId($id);
        $simpleUser = $instanceUser->getSimpleUser("Validé");
        return view("pages.gestionusers.modifUser", compact("tittle", "simpleUser", "listeRole"));
    }

    public function modificationUtilisateur(Request $request)
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $user = User::find($request->users_id);
        $user->first_name = strtoupper($request->nom);
        $user->last_name = ucwords($request->prenom);
        $user->email = $request->email;
        $user->roles_id = $request->role;
        $user->update();

        return redirect()->route("pages.gestionusers.listeUtilisateur");
    }

    public function tableauDeBord()
    {
        $tittle = "Tableau de bord";
        return view("pages.dashbord", compact("tittle"));
    }
}
