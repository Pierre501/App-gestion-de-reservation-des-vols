<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use App\Models\TypeTarif;
use Illuminate\Http\Request;

class TarifController extends Controller
{
    
    public function pageAjoutTypeTarif()
    {
        $tittle = "Ajout type tarif";
        return view("pages.gestiontarif.ajoutTypeTarif", compact("tittle"));
    }

    public function pageModificationTypeTarif($id)
    {
        $tittle = "Modification type tarif";
        $instanceTypeTarif = new TypeTarif();
        $instanceTypeTarif->setId($id);
        $simpleTypeTarif = $instanceTypeTarif->getSimpleTypeTarif();
        return view("pages.gestiontarif.modifTypeTarif", compact("tittle", "simpleTypeTarif"));
    }

    public function pageListeTarif()
    {
        $tittle = "Liste tarif";
        $idTypeTarif = 1;
        $instanceTarif = new Tarif();
        $listeTarif = $instanceTarif->getAllTarifAvecTypeTarif($idTypeTarif);
        return view("pages.gestiontarif.listeTarif", compact("tittle", "listeTarif"));
    }

    public function pageListeTypeTarifAdmin()
    {
        $tittle = "Liste tarif";
        $instanceTypeTarif = new TypeTarif();
        $listeTypeTarif = $instanceTypeTarif->getAllTypeTarif();
        return view("pages.gestiontarif.listeTypeTarifAdmin", compact("tittle", "listeTypeTarif"));
    }

    public function ajoutTypeTarif(Request $request)
    {
        $request->validate([
            'type_tarif' => ['required', 'string', 'max:100'],
        ]);

        $instanceTypeTarif = new TypeTarif();
        $instanceTypeTarif->setTypeTarif(ucfirst($request->type_tarif));
        $instanceTypeTarif->insertionTypeTarif();

        return redirect()->route("pageListeTypeTarifAdmin");
    }

    public function modificationTypeTarif(Request $request)
    {
        $request->validate([
            'type_tarif' => ['required', 'string', 'max:100'],
        ]);

        $instanceTypeTarif = new TypeTarif();
        $instanceTypeTarif->setId($request->type_tarifs_id);
        $instanceTypeTarif->setTypeTarif(ucfirst($request->type_tarif));
        $instanceTypeTarif->updateTypeTarif();

        return redirect()->route("pageListeTypeTarifAdmin");
    }

    public function suppressionTypeTarif(Request $request)
    {
        $instanceTarif = new Tarif();
        $instanceTarif->setIdTypeTarif($request->type_tarifs_id);
        $instanceTarif->deleteTarifByIdTypeTarif();
        $instanceTypeTarif = new TypeTarif();
        $instanceTypeTarif->setId($request->type_tarifs_id);
        $instanceTypeTarif->deleteTypeTarif();
        return redirect()->route("pageListeTypeTarifAdmin");
    }

    public function pageListeTarifAdmin($id)
    {
        $instanceTarif = new Tarif();
        $listeTarif = $instanceTarif->getAllTarifAvecTypeTarif($id);
        $instanceTypeTarif = new TypeTarif();
        $instanceTypeTarif->setId($id);
        $simpleTypeTarif = $instanceTypeTarif->getSimpleTypeTarif();
        $tittle = "Liste des types tarifs ".strtolower($simpleTypeTarif->getTypeTarif());
        return view("pages.gestiontarif.listeTarifAdmin", compact("tittle", "listeTarif", "simpleTypeTarif"));
    }

    public function ajaxSimpleTypeTarif($id)
    {
        $instanceTypeTarif = new TypeTarif();
        $instanceTypeTarif->setId($id);
        $simpleTypeTarif = $instanceTypeTarif->getSimpleTypeTarif();
        echo json_encode($simpleTypeTarif);
    }

    public function pageAjoutTarifAdmin($id)
    {
        $instanceTypeTarif = new TypeTarif();
        $instanceTypeTarif->setId($id);
        $simpleTypeTarif = $instanceTypeTarif->getSimpleTypeTarif();
        $tittle = "Ajout tarif de type ".strtolower($simpleTypeTarif->getTypeTarif());
        return view("pages.gestiontarif.ajouTarif", compact("tittle", "simpleTypeTarif"));
    }

    public function ajoutTarifAdmin(Request $request)
    {
        $request->validate([
            'lieu_depart' => ['required', 'string', 'max:100'],
            'lieu_arrive' => ['required', 'string', 'max:100'],
            'montant_tarif' => ['required'],
        ]);

        $instanceTarif = new Tarif();
        $instanceTarif->setLieuDepart(ucfirst($request->lieu_depart));
        $instanceTarif->setLieuArrive(ucfirst($request->lieu_arrive));
        $instanceTarif->setMontantTarif($request->montant_tarif);
        $instanceTarif->setIdTypeTarif($request->type_tarifs_id);
        $instanceTarif->insertionTarif();

        return redirect()->route("pageListeTarifAdmin", ["id"=>$request->type_tarifs_id]);
    }

    public function ajaxSimpleTarif($id)
    {
        $instanceTarif = new Tarif();
        $instanceTarif->setId($id);
        $simpleTarif = $instanceTarif->getSimpleTarif();
        echo json_encode($simpleTarif);
    }

    public function suppressionTarif(Request $request)
    {
        $instanceTarif = new Tarif();
        $instanceTarif->setId($request->tarifs_id);
        $simpleTarif = $instanceTarif->getSimpleTarif();
        $instanceTarif->deleteTarif();

        return redirect()->route("pageListeTarifAdmin", ["id"=>$simpleTarif->getIdTypeTarif()]);
    }

    public function pageModificationTarifAdmin($id)
    {
        $instanceTarif = new Tarif();
        $instanceTarif->setId($id);
        $simpleTarif = $instanceTarif->getSimpleTarif();
        $instanceTypeTarif = new TypeTarif();
        $instanceTypeTarif->setId($simpleTarif->getIdTypeTarif());
        $simpleTypeTarif = $instanceTypeTarif->getSimpleTypeTarif();
        $tittle = "Modification tarif de type ".ucfirst($simpleTypeTarif->getTypeTarif());
        return view("pages.gestiontarif.modifTarif", compact("tittle", "simpleTarif", "simpleTypeTarif"));

    }

    public function modificationTarifAdmin(Request $request)
    {
        $request->validate([
            'lieu_depart' => ['required', 'string', 'max:100'],
            'lieu_arrive' => ['required', 'string', 'max:100'],
            'montant_tarif' => ['required'],
        ]);

        $instanceTarif = new Tarif();
        $instanceTarif->setId($request->tarifs_id);
        $instanceTarif->setIdTypeTarif($request->type_tarifs_id);
        $instanceTarif->setLieuDepart($request->lieu_depart);
        $instanceTarif->setLieuArrive($request->lieu_arrive);
        $instanceTarif->setMontantTarif($request->montant_tarif);
        $instanceTarif->updateTarif();

        return redirect()->route("pageListeTarifAdmin", ["id"=>$request->type_tarifs_id]);
    }
}


