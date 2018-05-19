<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function categorie()
    {
        return $this->belongsTo('App\Models\Categorie');
    }

    public function mediafiles()
    {
        return $this->hasMany('App\Models\Mediafile');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}
