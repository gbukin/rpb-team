<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tasks\TaskCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TaskCategoryController extends Controller
{
    public function create()
    {
        return Inertia::render('Admin/Tasks/Categories/CategoryCreate');
    }

    public function store(Request $request)
    {
        $task_type = new TaskCategory();
        $task_type->category = $request->request->get('category');
        $task_type->save();

        return Redirect::route('admin.tasks');
    }
}
