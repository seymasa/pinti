<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile() {
        return $this->hasOne('App\UserProfile', 'user_id');
    }

    public function categories() {
        return $this->hasMany('App\Category');
    }

    public function actions() {
        return $this->hasMany('App\Action');
    }

    public function currencies() {
        return $this->hasMany('App\Currency');
    }

    public function accounts() {
        return $this->hasMany('App\Account');
    }

    public function groups() {
        return $this->belongsToMany('App\Group');
    }

    public function getFullnameAttribute() {
        $result = null;

        if ($this->profile){
            if ($this->profile->firstname)
                $result = $this->profile->firstname;

            if ($this->profile->surname)
                $result .= " ".$this->profile->surname;

            if (!$this->profile->firstname && !$this->profile->surname)
                $result = $this->email;
        }

        return $result;
    }

    public function getPhotoAttribute() {

        if($this->profile && $this->profile->photo)
            return asset($this->profile->photo);
        else
            return "https://api.adorable.io/avatars/285/".$this->email.".png";

    }
}
