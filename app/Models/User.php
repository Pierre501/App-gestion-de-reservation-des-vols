<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'etat', 'roles_id'];
    protected $dateCreation;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = ['email_verified_at' => 'datetime'];

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setFirstName(string $firstName): void
    {
        $this->first_name = $firstName;
    }

    public function getFirstName(): string
    {
        return $this->first_name;
    }

    public function setLastName(string $lastName): void
    {
        $this->last_name = $lastName;
    }

    public function getLastName(): string
    {
        return $this->last_name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setEtat(string $etat): void
    {
        $this->etat = $etat;
    }

    public function getEtat(): string
    {
        return $this->etat;
    }

    public function setIdRole(int $idRole): void
    {
        $this->roles_id = $idRole;
    }

    public function getIdRole(): int
    {
        return $this->roles_id;
    }

    public function setDateCreation($createdAt): void
    {
        $this->dateCreation = Fonction::formatDate($createdAt, "-");
    }

    public function getDateCreation(): string
    {
        return $this->dateCreation;
    }

    public function getDataUsers()
    {
        $data = array();
        $data['first_name'] = $this->getFirstName();
        $data['last_name'] = $this->getLastName();
        $data['email'] = $this->getEmail();
        $data['password'] = $this->getPassword();
        $data['etat'] = $this->getEtat();
        $data['roles_id'] = $this->getIdRole();
        return $data;
    }

    public function insertionUser()
    {
        $dataUsers = $this->getDataUsers();
        User::create($dataUsers);
    }

    public function isAdministrateur(User $user): bool
    {
        $verification = false;
        $query = DB::table("users")
                ->join("roles", "users.roles_id", "roles.id")
                ->where("users.id", $user->id)
                ->get();
        foreach($query as $row)
        {
            if($row->role == "Administrateur")
            {
                $verification = true;
            }
        }
        return $verification;
    }

    public function verificationUser($email)
    {
        $condition = false;
        $listeUserNonValide = $this->getAllUser("Non validé");
        foreach($listeUserNonValide as $user)
        {
            if($user->getEmail() == $email)
            {
                $condition = true;
                break;
            }
        }
        return $condition;
    }

    public function getSimpleUser($etat)
    {
        $instanceUser = new User();
        $sql = DB::table("users");
        $sql->where("id", $this->getId());
        $sql->where("etat", $etat);
        $query = $sql->get();
        foreach($query as $row)
        {
            $instanceUser->setId($row->id);
            $instanceUser->setFirstName($row->first_name);
            $instanceUser->setLastName($row->last_name);
            $instanceUser->setEmail($row->email);
            $instanceUser->setPassword($row->password);
            $instanceUser->setEtat($row->etat);
            $instanceUser->setIdRole($row->roles_id);
            $instanceUser->setDateCreation($row->created_at);
            break;
        }
        return $instanceUser;
    }

    public function getAllUser($etat)
    {
        $listeUser = array();
        $sql = DB::table("users");
        $sql->where("etat", $etat);
        $query = $sql->get();
        foreach($query as $row)
        {
            if($row->etat == $etat)
            {
                $instanceUser = new User();
                $instanceUser->setId($row->id);
                $instanceUser->setFirstName($row->first_name);
                $instanceUser->setLastName($row->last_name);
                $instanceUser->setEmail($row->email);
                $instanceUser->setPassword($row->password);
                $instanceUser->setEtat($row->etat);
                $instanceUser->setIdRole($row->roles_id);
                $instanceUser->setDateCreation($row->created_at);
                $listeUser[] = $instanceUser;
            }
        }
        return $listeUser;
    }

    public function getQeuryAllUsersAvecPagination($etat, $page)
    {
        $query = DB::table("users")->where("etat", $etat)->paginate($page);
        return $query;
    }

    public function getAllUserAvecPagination($etat, $page)
    {
        $listeUser = array();
        $query = $this->getQeuryAllUsersAvecPagination($etat, $page);
        foreach($query as $row)
        {
            if($row->etat == $etat)
            {
                $instanceUser = new User();
                $instanceUser->setId($row->id);
                $instanceUser->setFirstName($row->first_name);
                $instanceUser->setLastName($row->last_name);
                $instanceUser->setEmail($row->email);
                $instanceUser->setPassword($row->password);
                $instanceUser->setEtat($row->etat);
                $instanceUser->setIdRole($row->roles_id);
                $instanceUser->setDateCreation($row->created_at);
                $listeUser[] = $instanceUser;
            }
        }
        return $listeUser;
    }
}
