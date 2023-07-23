<?php

namespace App\Models\Tasks;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

    public function getEditComponent(): string
    {
        return match ($this->taskType->type) {
            'flag' => 'Admin/Tasks/TaskEditCtf',
            'form' => 'Admin/Tasks/TaskEditForm',
            default => 'Admin/Tasks/TaskEdit',
        };
    }

    public function getEditRelatedModel(): array
    {
        return match ($this->taskType->type) {
            'flag' => ['task_ctf' => $this->taskCtf],
            'form' => ['task_form' => $this->taskForm],
            default => [],
        };
    }

    public function getRelatedModelByType(): TaskCtf|TaskForm
    {
        return match ($this->taskType->type) {
            'flag' => new TaskCtf,
            'form' => new TaskForm,
            default => '',
        };
    }

    public function updateRelated($data): void
    {
        switch ($this->taskType->type) {
            case 'form':
                $this->updateTaskForm($data);
                break;
            case 'flag':
                $this->updateTaskCtf($data);
                break;
        }
    }

    public function updateTaskForm(array $data): void
    {
        $task_form = $this->taskForm;
        $task_form->fields = json_encode($data['fields']);
        $task_form->update();
    }

    public function updateTaskCtf(array $data): void
    {
        $task_ctf = $this->taskCtf;
        $task_ctf->flag = $data['flag'];
        $task_ctf->update();
    }

    public function taskType(): BelongsTo
    {
        return $this->belongsTo(TaskType::class);
    }

    public function taskCtf(): HasOne
    {
        return $this->hasOne(TaskCtf::class);
    }

    public function taskForm(): HasOne
    {
        return $this->hasOne(TaskForm::class);
    }
}
