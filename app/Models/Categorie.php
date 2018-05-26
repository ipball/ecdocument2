<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public $timestamps = false;
    // relation
    public function documents()
    {
        return $this->hasMany('App\Models\Document');
    }
}
