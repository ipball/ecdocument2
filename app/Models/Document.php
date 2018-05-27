<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $dates = [
        'created_at',
        'updated_at',
        'doc_date'
    ];

    public function categorie()
    {
        return $this->belongsTo('App\Models\Categorie');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }
}
