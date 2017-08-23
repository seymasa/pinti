<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function currency() {
        return $this->belongsTo('App\Currency');
    }

    public function actions() {
        return $this->hasMany('App\Action');
    }
}
