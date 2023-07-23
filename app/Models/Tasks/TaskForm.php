<?php

namespace App\Models\Tasks;

use Illuminate\Database\Eloquent\Model;

class TaskForm extends Model
{
    protected $table = 'tasks_form';

    protected $primaryKey = 'task_id';
    public $incrementing = false;
}
