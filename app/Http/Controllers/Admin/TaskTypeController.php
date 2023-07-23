<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tasks\TaskType;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Redirect;

class TaskTypeController extends Controller
{
    public function index()
    {
        return Inertia::render(
            'Admin/Tasks/Types/Types',
            ['types' => TaskType::withTrashed()->get()]
        );
    }

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

        return Redirect::route('admin.tasks.types.index');
    }

    public function archive(TaskType $type)
    {
        $type->delete();

        return Redirect::back();
    }

    public function delete(TaskType $type)
    {
        $type->forceDelete();

        return Redirect::back();
    }
}
