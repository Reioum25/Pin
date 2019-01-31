<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Subscription extends Model
{
    protected $appends = ['remaining'];

    public function getRemainingAttribute()
    {
        $deadline = Carbon::parse($this->attributes['subscribed'])->addMonths($this->attributes['date_length']);
        return $deadline->toDayDateTimeString();
    }

    public function getSubscribedAttribute($value)
    {
        return Carbon::parse($value)->toDayDateTimeString();
    }
}
