<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PORequestMarket;

class PORequestItemDetails extends Model
{
    public function requestmarket()
    {
        return $this->belongsTo('App\PORequestMarket');
    }
}
