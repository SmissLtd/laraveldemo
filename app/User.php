<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property boolean $is_admin
 */
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'is_admin'];
    protected $hidden = ['password', 'remember_token'];
    
    public function orders()
    {
        return $this->hasMany('App\Order');
    }
    
    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }
}