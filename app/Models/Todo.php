<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    public function user()
    {
        $this->belongsTo('App\Models\User');
    }

    protected $fillable = [
        'user_id',
        'todo',
        'completed'
    ];
}
