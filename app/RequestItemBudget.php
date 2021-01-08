<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestItemBudget extends Model
{
    public function requestmanager()
    {
        return $this->belongsTo('App\RequestManager');
    }
}
