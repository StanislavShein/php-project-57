<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'task_id',
    ];

    public function task()
    {
        return $this->hasMany('App\Models\Task', 'label_id');
    }
}
