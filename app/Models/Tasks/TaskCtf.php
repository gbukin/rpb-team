<?php

namespace App\Models\Tasks;

use Illuminate\Database\Eloquent\Model;

class TaskCtf extends Model
{
    protected $table = 'tasks_ctf';

    protected $primaryKey = 'task_id';
    public $incrementing = false;
}
