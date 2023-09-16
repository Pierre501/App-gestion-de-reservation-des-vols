<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class TypeTarif extends BasesModel
{
    use HasFactory;

    protected $fillable = ['type_tarif'];

    public function setTypeTarif(string $typeTarif): void
    {
        $this->type_tarif = $typeTarif;
    }

    public function getTypeTarif(): string
    {
        return $this->type_tarif;
    }

    public function getSimpleTypeTarif(): TypeTarif
    {
        $simpleTypeTarif = new TypeTarif();
        $row = TypeTarif::find($this->getId());
        $simpleTypeTarif->setId($row->id);
        $simpleTypeTarif->setTypeTarif($row->type_tarif);
        return $simpleTypeTarif;
    }

    public function getAllTypeTarif()
    {
        $listeTypeTarif = array();
        $query = TypeTarif::all();
        foreach($query as $row)
        {
            $instanceTypetarif = new TypeTarif();
            $instanceTypetarif->setId($row->id);
            $listeTypeTarif[] = $instanceTypetarif->getSimpleTypeTarif();
        }
        return $listeTypeTarif;
    }

    public function getDataTypeTarif()
    {
        $data['type_tarif'] = $this->getTypeTarif();
        return $data;
    }

    public function insertionTypeTarif()
    {
        $dataTypetarif = $this->getDataTypeTarif();
        TypeTarif::create($dataTypetarif);
    }

    public function updateTypeTarif()
    {
        $dataTypetarif = $this->getDataTypeTarif();
        DB::table("type_tarifs")->where("id", $this->getId())->update($dataTypetarif);
    }

    public function deleteTypeTarif()
    {
        DB::table("type_tarifs")->where("id", $this->getId())->delete();
    }
}
