<?php

use App\Http\Controllers\AvionController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TarifController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'pageLogin']);

Route::get('/home', [HomeController::class, 'pageHome'])->middleware(['auth'])->name('home');

Route::middleware('auth')->group(function () {

    Route::controller(UserController::class)->group(function(){

        Route::get('/liste-des-utilisteurs', 'pageListeUtilisateur')->name('pages.gestionusers.listeUtilisateur');

        Route::get('/liste-des-utilisteurs-non-valide', 'pageListeUtilisateurNonValide')->name('pages.gestionusers.listeCompteNonValide');

        Route::get('/ajax-simple-user/{id}/{etat}', 'ajaxGetSimpleUser');

        Route::post('/confirme_utilisateur', 'confirmeUtilisateur')->name('confirmeUtilisateur');

        Route::post('/desactive_utilisateur', 'desactiveUtilisateur')->name('desactiveUtilisateur');

        Route::post('/supprime_utilisateur', 'deleteUtilisateur')->name('deleteUtilisateur');

        Route::get('/page-modification-utilisateur/{id}', 'pageModificationUtilisateur')->name('pageModificationUtilisateur');

        Route::post('/modification_utilisateur', 'modificationUtilisateur')->name('modificationUtilisateur');

        Route::get('/tableau-de-bord', 'tableauDeBord')->name('tableauDeBord');

    });

    Route::controller(ClientController::class)->group(function(){

        Route::get("/page-ajout-client", "pageAjoutClient")->name("pages.gestionclient.ajoutClient");

        Route::get("/liste-client", "pageListeClient")->name("pages.gestionclient.listeClient");

        Route::post("/ajout-client", "ajoutClient")->name("ajoutClient");

        Route::get("/page-modification-client/{id}", "pageModificationClient")->name("pageModificationClient");

        Route::post("/modification-client", "modificationClient")->name("modificationClient");

        Route::get("/ajax-simple-client/{id}", "ajaxGetSimpleClient");

    });

    Route::controller(TarifController::class)->group(function(){

        Route::get("/page-liste-tarifs", "pageListeTarif")->name("pageListeTarif");

        Route::get("/page-liste-type-tarifs", "pageListeTypeTarifAdmin")->name("pageListeTypeTarifAdmin");

        Route::get("/page-ajout-type-tarifs", "pageAjoutTypeTarif")->name("pageAjoutTypeTarif");

        Route::post("/ajout-type-tarifs", "ajoutTypeTarif")->name("ajoutTypeTarif");

        Route::get("/page-modification-type-tarif/{id}", "pageModificationTypeTarif")->name("pageModificationTypeTarif");

        Route::post("/modification-type-tarif", "modificationTypeTarif")->name("modificationTypeTarif");

        Route::get("/page-liste-tarif-admin/{id}", "pageListeTarifAdmin")->name("pageListeTarifAdmin");

        Route::get("/ajax-simple-type-tarif/{id}", "ajaxSimpleTypeTarif")->name("ajaxSimpleTypeTarif");

        Route::post("/suppression-type-tarif", "suppressionTypeTarif")->name("suppressionTypeTarif");

        Route::get("/page-ajout-tarifs/{id}", "pageAjoutTarifAdmin")->name("pageAjoutTarifAdmin");

        Route::post("/ajout-tarifs", "ajoutTarifAdmin")->name("ajoutTarifAdmin");

        Route::get("/ajax-simple-tarifs/{id}", "ajaxSimpleTarif")->name("ajaxSimpleTarif");

        Route::post("/suppression-tarifs", "suppressionTarif")->name("suppressionTarif");

        Route::get("/page-modification-tarifs/{id}", "pageModificationTarifAdmin")->name("pageModificationTarifAdmin");

        Route::post("/modification-tarifs", "modificationTarifAdmin")->name("modificationTarifAdmin");

    });

    Route::controller(AvionController::class)->group(function(){

        Route::get("/page-modele-classe-avion", "pageParametreAvion")->name("pageParametreAvion");

        Route::get("/page-ajout-modèle-avion", "pageAjoutModeleAvion")->name("pageAjoutModeleAvion");

        Route::get("/page-ajout-classe-avion", "pageAjoutClasseAvion")->name("pageAjoutClasseAvion");

        Route::post("/ajout-modele-avion", "ajoutModeleAvion")->name("ajoutModeleAvion");

        Route::post("/ajout-classe-avion", "ajoutClasseAvion")->name("ajoutClasseAvion");

        Route::get("/page-modification-modèle-avion/{id}", "pageModifModeleAvion")->name("pageModifModeleAvion");

        Route::get("/page-modification-classe-avion/{id}", "pageModifClasseAvion")->name("pageModifClasseAvion");

        Route::post("/modification-modèle-avion", "modifModeleAvion")->name("modifModeleAvion");

        Route::post("/modification-classe-avion", "modifClasseAvion")->name("modifClasseAvion");

        Route::get("/page-ajout-avion", "pageAjoutAvion")->name("pageAjoutAvion");

    });

});

require __DIR__.'/auth.php';
