<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens;

    protected $fillable = ['username', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    public function todo_lists()
    {
        return $this->hasMany('App\Models\TodoList');
    }

    public function findForPassport($username)
    {
        return $this->where('username', $username)->first();
    }
}
