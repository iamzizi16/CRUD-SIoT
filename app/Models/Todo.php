<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = [
        'title',
        'tanggal',
        'jam',
        'prioritas',
        'is_done'
    ];
}
