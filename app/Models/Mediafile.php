<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mediafile extends Model
{
    public function document()
    {
        return $this->belongsTo('App\Models\Document');
    }
}
