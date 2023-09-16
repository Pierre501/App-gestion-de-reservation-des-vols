<?php

namespace App\Http\Controllers;

use App\Models\ClasseAvion;
use App\Models\ModeleAvion;
use Illuminate\Http\Request;

class AvionController extends Controller
{
    
    public function pageParametreAvion()
    {
        $tittle = "Parametre avion";
        $pagination = 10;
        $instanceModeleAvion = new ModeleAvion();
        $paginationListeModeleAvion = $instanceModeleAvion->getQueryAllModeleAvion($pagination);
        $listeModeleAvion = $instanceModeleAvion->getAllModeleAvionAvecPagination($pagination);
        $instanceClasseAvion = new ClasseAvion();
        $paginationListeClasseAvion = $instanceClasseAvion->getQueryAllClasseAvion($pagination);
        $listeClasseAvion = $instanceClasseAvion->getAllClasseAvionAvecPagination($pagination);
        return view("pages.gestionavion.parametreAvion", compact("tittle", "paginationListeModeleAvion", "listeModeleAvion", "paginationListeClasseAvion", "listeClasseAvion"));
    }

    public function pageAjoutModeleAvion()
    {
        $tittle = "Page ajout d'une modèle avion";
        return view("pages.gestionavion.ajoutModeleAvion", compact("tittle"));
    }

    public function pageAjoutClasseAvion()
    {
        $tittle = "Page ajout d'une classe avion";
        return view("pages.gestionavion.ajoutClasseAvion", compact("tittle"));
    }

    public function ajoutModeleAvion(Request $request)
    {

        $request->validate([
            "nom_modele" => ["required", "string", "max:100", "unique:modele_avions,nom_modele"],
        ]);

        $instanceModeleAvion = new ModeleAvion();
        $instanceModeleAvion->setNomModele(ucfirst($request->nom_modele));
        $instanceModeleAvion->insertionModleAvion();

        return redirect()->route("pageParametreAvion");
    }

    public function ajoutClasseAvion(Request $request)
    {
        $request->validate([
            "nom_classe" => ["required", "string", "max:100", "unique:classe_avions,nom_classe"],
        ]);

        $instanceClasseAvion = new ClasseAvion();
        $instanceClasseAvion->setNomClasse(ucfirst($request->nom_classe));
        $instanceClasseAvion->insertionClasseAvion();

        return redirect()->route("pageParametreAvion");
    }

    public function pageModifModeleAvion($id)
    {
        $tittle = "Page modification d'une classe avion";
        $instanceModeleAvion = new ModeleAvion();
        $instanceModeleAvion->setId($id);
        $simpleModeleAvion = $instanceModeleAvion->getSimpleModeleAvion();
        return view("pages.gestionavion.modifModeleAvion", compact("tittle", "simpleModeleAvion", ));
    }

    public function pageModifClasseAvion($id)
    {
        $tittle = "Page modification d'un modèle avion";
        $instanceClasseAvion = new ClasseAvion();
        $instanceClasseAvion->setId($id);
        $simpleClasseAvion = $instanceClasseAvion->getSimpleClasseAvion();
        return view("pages.gestionavion.modifClasseAvion", compact("tittle", "simpleClasseAvion"));
    }

    public function modifModeleAvion(Request $request)
    {
        $instanceModeleAvion = new ModeleAvion();
        $instanceModeleAvion->setId($request->modele_avions_id);
        if(strcmp(strtolower($instanceModeleAvion->getSimpleModeleAvion()->getNomModele()), $request->nom_modele) == 0)
        {
            $request->validate([
                "nom_modele" => ["required", "string"],
            ]);
        }
        else
        {
            $request->validate([
                "nom_modele" => ["required", "string", "max:100", "unique:modele_avions,nom_modele"],
            ]);
        }

        $instanceModeleAvion->setNomModele(ucfirst($request->nom_modele));
        $instanceModeleAvion->updateModeleAvion();

        return redirect()->route("pageParametreAvion");
    }

    public function modifClasseAvion(Request $request)
    {
        $instanceClasseAvion = new ClasseAvion();
        $instanceClasseAvion->setId($request->classe_avions_id);
        if(strcmp(strtolower($instanceClasseAvion->getSimpleClasseAvion()->getNomClasse()), $request->nom_classe) == 0)
        {
            $request->validate([
                "nom_classe" => ["required", "string"],
            ]);
        }
        else
        {
            $request->validate([
                "nom_classe" => ["required", "string", "max:100", "unique:classe_avions,nom_classe"],
            ]);
        }

        $instanceClasseAvion->setNomClasse(ucfirst($request->nom_classe));
        $instanceClasseAvion->updateClasseAvion();

        return redirect()->route("pageParametreAvion");
    }

    public function pageAjoutAvion()
    {
        $tittle = "Page ajouté un avion";
        return view("pages.gestionavion.ajoutAvion", compact("tittle"));
    }

    public function ajoutAvion()
    {
       
    }
}
