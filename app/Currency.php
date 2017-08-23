<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function actions() {
        return $this->hasMany('App\Action');
    }

    public function accounts() {
        return $this->hasMany('App\Account');
    }
}
