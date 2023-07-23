<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tasks\Task;
use App\Models\Tasks\TaskCategory;
use App\Models\Tasks\TaskType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TaskController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Tasks/Tasks')
            ->with(['tasks' => Task::all()]);
    }

    public function create()
    {
        return Inertia::render('Admin/Tasks/TaskCreate')
            ->with([
                'task_types' => TaskType::all()->pluck('type_name', 'id')->all(),
                'task_categories' => TaskCategory::all()->pluck('category', 'id')->all()
            ]);
    }

    public function store(Request $request)
    {
        $form = $request->request->all();

        $task = new Task();
        $task->title = $form['title'];
        $task->description = $form['description'];
        $task->difficulty = $form['difficulty'];
        $task->task_type_id = $form['task_type'];
        $task->task_category_id = $form['task_category'];

        $task->save();

        return Redirect::route('admin.tasks.edit', ['task' => $task]);
    }

    public function edit(Task $task)
    {
        return Inertia::render(
            $task->getEditComponent(),
            array_merge(['task' => $task], $task->getEditRelatedModel())
        );
    }

    public function update(Request $request, Task $task)
    {
        $form = $request->request->all();

        $task->title = $form['title'];
        $task->description = $form['description'];
        $task->difficulty = $form['difficulty'];

        $task->updateRelated($request->request->all());
//        dump($task);
//        $task->task_type_id = $form['task_type_id'];
//        $task->task_category_id = $form['task_category_id'];
        $task->save();

//        return Redirect::back();
    }

    public function archive(Task $task)
    {
        $task->delete();

        return Redirect::back();
    }

    public function delete(Task $task)
    {
        $task->forceDelete();

        return Redirect::back();
    }
}
