<?php

namespace App\Observers\Tasks;

use App\Models\Tasks\Task;
use App\Models\Tasks\TaskCtf;
use App\Models\Tasks\TaskForm;

class TaskObserver
{
    public function created(Task $task): void
    {
        switch ($task->taskType->type) {
            case 'form':
            case 'flag';
                $related = $task->getRelatedModelByType();
                $related->task_id = $task->id;
                $related->save();
                break;
            default:
                break;
        }
    }

    /**
     * Handle the Task "updated" event.
     */
    public function updated(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "deleted" event.
     */
    public function deleted(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "restored" event.
     */
    public function restored(Task $task): void
    {
        //
    }

    /**
     * Handle the Task "force deleted" event.
     */
    public function forceDeleted(Task $task): void
    {
        //
    }
}
