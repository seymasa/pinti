<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    public function user() {
        return $this->belongsTo('App\User');
    }

    public function account() {
        return $this->belongsTo('App\Account');
    }

    public function currency() {
        return $this->belongsTo('App\Currency');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function targetAccount() {
        return $this->belongsTo('App\Account', 'target_account_id');
    }
}
