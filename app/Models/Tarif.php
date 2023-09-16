<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Tarif extends TypeTarif
{
    use HasFactory;

    protected $fillable = ['lieu_depart', 'lieu_arrive', 'type_tarifs_id', 'montant_tarif'];

    public function setLieuDepart(string $lieuDepart): void
    {
        $this->lieu_depart = $lieuDepart;
    }

    public function getLieuDepart(): string
    {
        return $this->lieu_depart;
    }

    public function setLieuArrive(string $lieuArrive): void
    {
        $this->lieu_arrive = $lieuArrive;
    }

    public function getLieuArrive(): string
    {
        return $this->lieu_arrive;
    }

    public function setIdTypeTarif(int $idTypeTarif): void
    {
        $this->type_tarifs_id = $idTypeTarif;
    }

    public function getIdTypeTarif(): int
    {
        return $this->type_tarifs_id;
    }

    public function setMontantTarif(float $montant): void
    {
        $this->montant_type_tarif = $montant;
    }

    public function getMontantTarif(): float
    {
        return $this->montant_type_tarif;
    }

    public function getSimpleTarif(): Tarif
    {
        $simpleTarif = new Tarif();
        $row = Tarif::find($this->getId());
        $simpleTarif->setId($row->id);
        $simpleTarif->setLieuDepart($row->lieu_depart);
        $simpleTarif->setLieuArrive($row->lieu_arrive);
        $simpleTarif->setMontantTarif($row->montant_tarif);
        $simpleTarif->setIdTypeTarif($row->type_tarifs_id);
        return $simpleTarif;
    }

    public function getAllTarif()
    {
        $listeTarif = array();
        $query = Tarif::all();
        foreach($query as $row)
        {
            $instanceTarif = new Tarif();
            $instanceTarif->setId($row->id);
            $instanceTarif->setLieuDepart($row->lieu_depart);
            $instanceTarif->setLieuArrive($row->lieu_arrive);
            $instanceTarif->setMontantTarif($row->montant_tarif);
            $instanceTarif->setIdTypeTarif($row->type_tarifs_id);
            $listeTarif[] = $instanceTarif;
        }
        return $listeTarif;
    }

    public function getSimpleTarifAvecTypeTarif($idTypeTarif): Tarif
    {
        $simpleTarif = new Tarif();
        $sql = DB::table("type_tarifs");
        $sql->join("tarifs", "type_tarifs.id", "tarifs.type_tarifs_id");
        $sql->where("tarifs.id", $this->getId());
        if($idTypeTarif > 0)
        {
            $sql->where("type_tarifs.id", $idTypeTarif);
        }
        $row = end($sql->get());
        $simpleTarif->setId($row->id);
        $simpleTarif->setTypeTarif($row->type_tarif);
        $simpleTarif->setIdTypeTarif($row->type_tarifs_id);
        $simpleTarif->setLieuDepart($row->lieu_depart);
        $simpleTarif->setLieuArrive($row->lieu_arrive);
        $simpleTarif->setIdTypeTarif($row->type_tarifs_id);
        $simpleTarif->setMontantTarif($row->montant_tarif);
        return $simpleTarif;
    }

    public function getAllTarifAvecTypeTarif($idTypeTarif)
    {
        $listeTarifAvecTypeTarif = array();
        $sql = DB::table("type_tarifs");
        $sql->join("tarifs", "type_tarifs.id", "tarifs.type_tarifs_id");
        if($idTypeTarif > 0)
        {
            $sql->where("type_tarifs.id", $idTypeTarif);
        }
        $query = $sql->get();
        foreach($query as $row)
        {
            $instanceTarif = new Tarif();
            $instanceTarif->setId($row->id);
            $instanceTarif->setTypeTarif($row->type_tarif);
            $instanceTarif->setIdTypeTarif($row->type_tarifs_id);
            $instanceTarif->setLieuDepart($row->lieu_depart);
            $instanceTarif->setLieuArrive($row->lieu_arrive);
            $instanceTarif->setIdTypeTarif($row->type_tarifs_id);
            $instanceTarif->setMontantTarif($row->montant_tarif);
            $listeTarifAvecTypeTarif[] = $instanceTarif;
        }
        return $listeTarifAvecTypeTarif;
    }

    public function getDataTarif()
    {
        $data['lieu_depart'] = $this->getLieuDepart();
        $data['lieu_arrive'] = $this->getLieuArrive();
        $data['montant_tarif'] = $this->getMontantTarif();
        $data['type_tarifs_id'] = $this->getIdTypeTarif();
        return $data;
    }

    public function insertionTarif()
    {
        $dataTarif = $this->getDataTarif();
        Tarif::create($dataTarif);
    }

    public function deleteTarif()
    {
        DB::table("tarifs")->where("id", $this->getId())->delete();
    }

    public function deleteTarifByIdTypeTarif()
    {
        DB::table("tarifs")->where("type_tarifs_id", $this->getIdTypeTarif())->delete();
    }

    public function updateTarif()
    {
        $dataTarif = $this->getDataTarif();
        DB::table("tarifs")->where("id", $this->getId())->update($dataTarif);
    }
}


