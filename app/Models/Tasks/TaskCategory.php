<?php

namespace App\Models\Tasks;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TaskCategory extends Model
{
    use SoftDeletes;
}
