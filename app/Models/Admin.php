<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public $table = 'admins';
    protected $primaryKey = 'id';
<<<<<<< HEAD
    protected $fillable = ['id','name','email','password'];
    public $timestamp = false;
=======
    
>>>>>>> ac69fb334014cc601d4600c47d99b79be44ba6c4
}
