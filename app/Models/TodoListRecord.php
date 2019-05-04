<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TodoListRecord extends Model
{
    use SoftDeletes;

    protected $fillable = ['content', 'list_id'];

    public function todo_list()
    {
        return $this->belongsTo('App\Models\TodoList');
    }
}
