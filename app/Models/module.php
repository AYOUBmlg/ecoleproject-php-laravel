<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class module extends Model
{
   protected $fillable = ['nom', 'description', 'filiere_id', 'professeur_id'];
   public function filiere()
   {
       return $this->belongsTo(filiere::class, 'filiere_id');
   }
   
   public function professeur()
   {
       return $this->belongsTo(utulisateur::class, 'professeur_id');
   }
}
