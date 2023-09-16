<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ModeleAvion extends BasesModel
{
    use HasFactory;

    protected $fillable = ['nom_modele'];

    public function setNomModele(string $nomModele): void
    {
        $this->nom_modele = $nomModele;
    }

    public function getNomModele(): string
    {
        return $this->nom_modele;
    }

    public function getSimpleModeleAvion(): ModeleAvion
    {
        $instanceModeleAvion = new ModeleAvion();
        $row = ModeleAvion::find($this->getId());
        $instanceModeleAvion->setId($row->id);
        $instanceModeleAvion->setNomModele($row->nom_modele);
        return $instanceModeleAvion;
    }

    public function getAllModeleAvion()
    {
        $listeModeleAvion = array();
        $query = ModeleAvion::all();
        foreach($query as $row)
        {
            $instanceModeleAvion = new ModeleAvion();
            $instanceModeleAvion->setId($row->id);
            $instanceModeleAvion->setNomModele($row->nom_modele);
            $listeModeleAvion[] = $instanceModeleAvion;
        }
        return $listeModeleAvion;
    }

    public function getQueryAllModeleAvion($pagination)
    {
        $query = DB::table("modele_avions")->paginate($pagination);
        return $query;
    }

    public function getAllModeleAvionAvecPagination($pagination)
    {
        $listeModeleAvion = array();
        $query = $this->getQueryAllModeleAvion($pagination);
        foreach($query as $row)
        {
            $instanceModeleAvion = new ModeleAvion();
            $instanceModeleAvion->setId($row->id);
            $instanceModeleAvion->setNomModele($row->nom_modele);
            $listeModeleAvion[] = $instanceModeleAvion;
        }
        return $listeModeleAvion;
    }

    public function getDataModeleAvion()
    {
        $data['nom_modele'] = $this->getNomModele();
        return $data;
    }

    public function insertionModleAvion(): void
    {
        $dataModeleAvion = $this->getDataModeleAvion();
        ModeleAvion::create($dataModeleAvion);
    }

    public function updateModeleAvion(): void
    {
        $dataModeleAvion = $this->getDataModeleAvion();
        DB::table('modele_avions')->where('id', $this->getId())->update($dataModeleAvion);
    }
}
