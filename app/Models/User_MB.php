<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_MB extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'bio',
        'email',
        'phone',
        'profile_picture',
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
