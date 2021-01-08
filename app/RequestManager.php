<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestManager extends Model
{
    public function requestItemBudgets()
    {
        return $this->hasMany('App\RequestItemBudget', 'foreign_key', 'requestmanager_id');
    }
}
