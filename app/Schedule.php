<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'start_location', 'end_location', 'time',
    ];

    public function agency()
    {
        return $this->belongsTo('App\Agency', 'agency_id');
    }
}
