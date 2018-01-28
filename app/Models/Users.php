<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    
    protected $table = 'users';
    
    
    public function CheckLogin($username,$password)
    {
        return Users::where('username','=',$username)
        ->where('password','=',md5($password))
        ->first();
    }

    
}
