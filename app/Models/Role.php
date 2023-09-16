<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;


class Role extends BasesModel
{
    use HasFactory;

    protected $fillable = ['role'];

    public function setRole(string $role): void
    {
        $this->role = $role;
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function getSimpleRole()
    {
        $simpleRole = new Role();
        $row = Role::find($this->getId());
        $simpleRole->setId($row->id);
        $simpleRole->setRole($row->role);
        return $simpleRole;
    }

    public function getAllRole()
    {
        $listeRole = array();
        $query = Role::all();
        foreach($query as $row)
        {
            $simpleRole = new Role();
            $simpleRole->setId($row->id);
            $simpleRole->setRole($row->role);
            $listeRole[] = $simpleRole;
        }
        return $listeRole;
    }
}
