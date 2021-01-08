<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PORequestItemDetails;

class PORequestMarket extends Model
{
    // public function porequestItemDetails()
    // {
    //     return $this->hasMany('App\PORequestItemDetails', 'foreign_key', 'requestmarketperson_id');
    // }

    public function requestItems()
    {
        return $this->hasMany('App\PORequestItemDetails', 'foreign_key', 'requestmarket_id');
    }
}
