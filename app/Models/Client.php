<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Client extends BasesModel
{
    use HasFactory;

    protected $fillable = ['nom', 'prenom', 'cin', 'genre', 'code_telephonique1', 'numero_telephone1', 'code_telephonique2', 'numero_telephone2', 'adresse'];

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    public function getPrenom(): string
    {
        return $this->prenom;
    }

    public function setCin(string $cin): void
    {
        $this->cin = $cin;
    }

    public function getCin(): string
    {
        return $this->cin;
    }

    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setCodeTelepherique1(string $code): void
    {
        $this->code_telephonique1 = $code;
    }

    public function getCodeTelephonique1(): string
    {
        return $this->code_telephonique1;
    }

    public function setNumeroTelephone1(string|null $numero): void
    {
        if(is_null($numero))
        {
            $this->numero_telephone1 = "";
        }
        else
        {
            $this->numero_telephone1 = $numero;
        }
    }

    public function getNumeroTelephone1(): string
    {
        return $this->numero_telephone1;
    }

    public function setCodeTelepherique2(string $code): void
    {
        $this->code_telephonique2 = $code;
    }

    public function getCodeTelephonique2(): string
    {
        return $this->code_telephonique2;
    }

    public function setNumeroTelephone2(string|null $numero): void
    {
        if(is_null($numero))
        {
            $this->numero_telephone2 = "";
        }
        else
        {
            $this->numero_telephone2 = $numero;
        }
    }

    public function getNumeroTelephone2(): string
    {
        return $this->numero_telephone2;
    }

    public function setAdresse(string $adresse): void
    {
        $this->adresse = $adresse;
    }

    public function getAdresse(): string
    {
        return $this->adresse;
    }

    public function getSimpleClient()
    {
        $simpleClient = new Client();
        $row = Client::find($this->getId());
        $simpleClient->setId($row->id);
        $simpleClient->setNom($row->nom);
        $simpleClient->setPrenom($row->prenom);
        $simpleClient->setCin($row->cin);
        $simpleClient->setGenre($row->genre);
        $simpleClient->setCodeTelepherique1($row->code_telephonique1);
        $simpleClient->setNumeroTelephone1($row->numero_telephone1);
        $simpleClient->setCodeTelepherique2($row->code_telephonique2);
        $simpleClient->setNumeroTelephone2($row->numero_telephone2);
        $simpleClient->setAdresse($row->adresse);
        return $simpleClient;
    }

    public function getQueryAllClient($page)
    {
        $query = null;
        if(is_null($page))
        {
            $query = DB::table("clients")->get();
        }
        else
        {
            $query = DB::table("clients")->paginate($page);
        }
        return $query;
    }

    public function getAllClient($page)
    {
        $listeClient = array();
        $query = $this->getQueryAllClient($page);
        foreach($query as $row)
        {
            $instanceClient = new Client();
            $instanceClient->setId($row->id);
            $instanceClient->setNom($row->nom);
            $instanceClient->setPrenom($row->prenom);
            $instanceClient->setCin($row->cin);
            $instanceClient->setGenre($row->genre);
            $instanceClient->setCodeTelepherique1($row->code_telephonique1);
            $instanceClient->setNumeroTelephone1($row->numero_telephone1);
            $instanceClient->setCodeTelepherique2($row->code_telephonique2);
            $instanceClient->setNumeroTelephone2($row->numero_telephone2);
            $instanceClient->setAdresse($row->adresse);
            $listeClient[] = $instanceClient;
        }
        return $listeClient;
    }

    public function formaterNumeroTelephone($identification, $numero) 
    {
        $num = "+".$identification.$numero;
        $formatted_numero = preg_replace("/^(\+".$identification.")(\d{2})(\d{2})(\d{3})(\d{2})$/", "$1 $2 $3 $4 $5", $num);
        return $formatted_numero;
    }

    public function getDataClient()
    {
        $dataClient['nom'] = $this->getNom();
        $dataClient['prenom'] = $this->getPrenom();
        $dataClient['cin'] = $this->getCin();
        $dataClient['genre'] = $this->getGenre();
        $dataClient['code_telephonique1'] = $this->getCodeTelephonique1();
        $dataClient['numero_telephone1'] = $this->getNumeroTelephone1();
        $dataClient['code_telephonique2'] = $this->getCodeTelephonique2();
        $dataClient['numero_telephone2'] = $this->getNumeroTelephone2();
        $dataClient['adresse'] = $this->getAdresse();
        return $dataClient;
    }

    public function insertionClient()
    {
        $dataClient = $this->getDataClient();
        Client::create($dataClient);
    }

    public function updateClient()
    {
        $dataClient = $this->getDataClient();
        DB::table("clients")->where("id", $this->getId())->update($dataClient);
    }
}
