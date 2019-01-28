<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommercialSpace extends Model
{
    public function barangay()
    {
        return $this->belongsTo('App\Barangay');
    }
}
