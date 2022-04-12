<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room_list extends Model
{
    use HasFactory;

    public $table = 'room_lists';
    protected $fillable = [
        'name'
    ];
    protected $primaryKey = 'id';
}
