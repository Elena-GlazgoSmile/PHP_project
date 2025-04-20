<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User_MB extends Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    protected $fillable = [
        'name',
        'surname',
        'bio',
        'email',
        'phone',
        'profile_picture',
        'password',
    ];

    public function fullName()
    {
        return "{$this->name} {$this->surname}";
    }

    public function findId()
    {
        return "{$this->id}";
    }

    public function my_user(){
        return "{$this}";
    }

}
