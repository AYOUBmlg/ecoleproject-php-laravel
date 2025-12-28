<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class utulisateur extends Model
{
    protected $fillable = ['name', 'email', 'password', 'role', 'filiere_id'];

    public function filiere()
    {
        return $this->belongsTo(filiere::class, 'filiere_id');
    }
    
}
