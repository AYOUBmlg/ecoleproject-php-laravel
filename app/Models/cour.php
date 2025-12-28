<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cour extends Model
{
   protected $fillable = ['titre', 'description', 'type', 'fichier', 'module_id', 'filiere_id', 'professeur_id'];

    // Relations
    public function filiere()
    {
        return $this->belongsTo(filiere::class, 'filiere_id');
    }

    public function professeur()
    {
        return $this->belongsTo(utulisateur::class, 'professeur_id');
    }

    public function module()
    {
        return $this->belongsTo(module::class, 'module_id');
    }
}
