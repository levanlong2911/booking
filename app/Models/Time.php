<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    public $table = 'times';
    protected $fillable = [
        'name'
    ];
    protected $primaryKey = 'id';
}
