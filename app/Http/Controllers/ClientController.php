<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Fonction;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    
    public function pageAjoutClient()
    {
        $tittle = "Ajout client";
        $liste_code_telephonique = Fonction::getAllCodeTelephonique();
        ksort($liste_code_telephonique);
        return view("pages.gestionclient.ajoutClient", compact("tittle", "liste_code_telephonique"));
    }

    public function pageModificationClient($id)
    {
        $tittle = "Modification client";
        $liste_code_telephonique = Fonction::getAllCodeTelephonique();
        ksort($liste_code_telephonique);
        $instanceClient = new Client();
        $instanceClient->setId($id);
        $simpleClient = $instanceClient->getSimpleClient();
        return view("pages.gestionclient.modifClient", compact("tittle", "liste_code_telephonique", "simpleClient"));
    }

    public function pageListeClient()
    {
        $tittle = "Liste des clients";
        $pagination = 10;
        $instanceClient = new Client();
        $paginationListeClient = $instanceClient->getQueryAllClient($pagination);
        $listeClient = $instanceClient->getAllClient($pagination);
        return view("pages.gestionclient.listeClient", compact("tittle", "listeClient", "paginationListeClient"));
    }

    public function ajoutClient(Request $request)
    {
        if(!empty($request->num_telephone2))
        {
            $request->validate([
                'nom' => ['required', 'string', 'max:255'],
                'prenom' => ['required', 'string', 'max:255'],
                'cin' => ['required', 'string', 'unique:clients', 'max:12'],
                'genre' => ['required', 'string', 'max:10'],
                'num_telephone1' => ['required', 'string', 'min:9', 'max:9'],
                'num_telephone2' => ['required', 'string', 'min:9', 'max:9'],
            ]);
        }
        else
        {
            $request->validate([
                'nom' => ['required', 'string', 'max:255'],
                'prenom' => ['required', 'string', 'max:255'],
                'cin' => ['required', 'string', 'unique:clients', 'max:12'],
                'genre' => ['required', 'string', 'max:10'],
                'num_telephone1' => ['required', 'string', 'min:9', 'max:9'],
                'num_telephone2' => ['nullable'],
            ]);
        }

        $instanceClient = new Client();
        $instanceClient->setNom(strtoupper($request->nom));
        $instanceClient->setPrenom(ucwords($request->prenom));
        $instanceClient->setCin($request->cin);
        $instanceClient->setGenre($request->genre);
        $instanceClient->setCodeTelepherique1($request->code_telephonique1);
        $instanceClient->setNumeroTelephone1($request->num_telephone1);
        $instanceClient->setCodeTelepherique2($request->code_telephonique2);
        $instanceClient->setNumeroTelephone2($request->num_telephone2);
        $instanceClient->setAdresse(ucfirst($request->adresse));
        $instanceClient->insertionClient();

        return redirect()->route("pages.gestionclient.listeClient");
    }

    public function modificationClient(Request $request)
    {
        if(!empty($request->num_telephone2))
        {
            $request->validate([
                'nom' => ['required', 'string', 'max:255'],
                'prenom' => ['required', 'string', 'max:255'],
                'cin' => ['required', 'string', 'unique:clients', 'max:12'],
                'genre' => ['required', 'string', 'max:10'],
                'num_telephone1' => ['required', 'string', 'min:9', 'max:9'],
                'num_telephone2' => ['required', 'string', 'min:9', 'max:9'],
            ]);
        }
        else
        {
            $request->validate([
                'nom' => ['required', 'string', 'max:255'],
                'prenom' => ['required', 'string', 'max:255'],
                'cin' => ['required', 'string', 'unique:clients', 'max:12'],
                'genre' => ['required', 'string', 'max:10'],
                'num_telephone1' => ['required', 'string', 'min:9', 'max:9'],
                'num_telephone2' => ['nullable'],
            ]);
        }

        $instanceClient = new Client();
        $instanceClient->setId($request->clients_id);
        $instanceClient->setNom(strtoupper($request->nom));
        $instanceClient->setPrenom(ucwords($request->prenom));
        $instanceClient->setCin($request->cin);
        $instanceClient->setGenre($request->genre);
        $instanceClient->setCodeTelepherique1($request->code_telephonique1);
        $instanceClient->setNumeroTelephone1($request->num_telephone1);
        $instanceClient->setCodeTelepherique2($request->code_telephonique2);
        $instanceClient->setNumeroTelephone2($request->num_telephone2);
        $instanceClient->setAdresse(ucfirst($request->adresse));
        $instanceClient->updateClient();

        return redirect()->route("pages.gestionclient.listeClient");
    }

    public function ajaxGetSimpleClient($id)
    {
        $instanceClient = new Client();
        $instanceClient->setId($id);
        $simpleClient = $instanceClient->getSimpleClient();
        echo json_encode($simpleClient);
    }
}
