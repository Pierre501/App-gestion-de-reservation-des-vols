<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ClasseAvion extends BasesModel
{
    use HasFactory;

    protected $fillable = ['nom_classe'];

    public function setNomClasse(string $nomClasse): void
    {
        $this->nom_classe = $nomClasse;
    }

    public function getNomClasse(): string|null
    {
        return $this->nom_classe;
    }

    public function getDataClasseAvion()
    {
        $data['nom_classe'] = $this->getNomClasse();
        return $data;
    }

    public function getSimpleClasseAvion(): ClasseAvion
    {
        $instanceClasseAvion = new ClasseAvion();
        $row = ClasseAvion::find($this->getId());
        $instanceClasseAvion->setId($row->id);
        $instanceClasseAvion->setNomClasse($row->nom_classe);
        return $instanceClasseAvion;
    }

    public function getAllClasseAvion()
    {
        $listeClasseAvion = array();
        $query = ClasseAvion::all();
        foreach($query as $row)
        {
            $instanceClasseAvion = new ClasseAvion();
            $instanceClasseAvion->setId($row->id);
            $instanceClasseAvion->setNomClasse($row->nom_classe);
            $listeClasseAvion[] = $instanceClasseAvion;
        }
        return $listeClasseAvion;
    }

    public function getQueryAllClasseAvion($pagination)
    {
        $query = DB::table("classe_avions")->paginate($pagination);
        return $query;
    }

    public function getAllClasseAvionAvecPagination($pagination)
    {
        $listeClasseAvion = array();
        $query = $this->getQueryAllClasseAvion($pagination);
        foreach($query as $row)
        {
            $instanceClasseAvion = new ClasseAvion();
            $instanceClasseAvion->setId($row->id);
            $instanceClasseAvion->setNomClasse($row->nom_classe);
            $listeClasseAvion[] = $instanceClasseAvion;
        }
        return $listeClasseAvion;
    }

    public function insertionClasseAvion(): void
    {
        $dataClasseAvion = $this->getDataClasseAvion();
        ClasseAvion::create($dataClasseAvion);
    }

    public function updateClasseAvion(): void
    {
        $dataClasseAvion = $this->getDataClasseAvion();
        DB::table("classe_avions")->where("id", $this->getId())->update($dataClasseAvion);
    }
}
