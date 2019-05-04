<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoList extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'user_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function todo_list_records()
    {
        return $this->hasMany('App\Models\TodoListRecord');
    }
}
