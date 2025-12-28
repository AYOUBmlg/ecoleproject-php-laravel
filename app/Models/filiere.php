<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class filiere extends Model
{
   protected $fillable = ['nom', 'description'];

    public function utilisateurs()
    {
         return $this->hasMany(Utilisateur::class, 'filiere_id');


    }
    public function modules()
    {
         return $this->hasMany(Module::class, 'filiere_id');
    }
    public function cours()
    {
         return $this->hasMany(Cour::class, 'filiere_id');
    }
   
}
