<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tasks\TaskType;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;

class TaskTypeController extends Controller
{
    public function create()
    {
        return Inertia::render('Admin/Tasks/Types/TypeCreate');
    }

    public function store(Request $request)
    {
        $task_type = new TaskType();
        $task_type->type = $request->request->get('type');
        $task_type->type_name = $request->request->get('type_name');
        $task_type->save();

        return Redirect::route('admin.tasks');
    }
}
