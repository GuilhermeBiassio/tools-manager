<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'id_tool',
        'id_employee',
        'borrowed',
        'id_user'
    ];
}
