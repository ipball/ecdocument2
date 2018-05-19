<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    // relation
    public function documents()
    {
        return $this->hasMany('App\Models\Document');
    }
}
