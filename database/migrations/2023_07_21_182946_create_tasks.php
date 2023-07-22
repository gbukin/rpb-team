<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('task_types', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->autoIncrement();
            $table->string('type')->nullable(false)->comment('Тип задачи');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('task_categories', function (Blueprint $table) {
            $table->unsignedTinyInteger('id')->autoIncrement();
            $table->string('category')->nullable(false)->comment('Категория задачи');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(false)->comment('Название');
            $table->string('description', 400)->nullable(false)->comment('Описание');
            $table->unsignedTinyInteger('difficulty')->nullable(false)->comment('Сложность');

            $table->unsignedTinyInteger('task_type_id')->nullable(false)->comment('Тип задачи');
            $table->foreign('task_type_id')->references('id')->on(\App\Models\Tasks\TaskType::getModel()->getTable());

            $table->unsignedTinyInteger('task_category_id')->nullable(false)->comment('Категория задачи');
            $table->foreign('task_category_id')->references('id')->on(\App\Models\Tasks\TaskCategory::getModel()->getTable());

            $table->unsignedTinyInteger('attempts')->nullable()->default(null)->comment('Максимальное количество попыток, значение null обозначает неограниченное количество попыток для сдачи');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tasks_ctf', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id')->nullable(false);
            $table->foreign('task_id')->references('id')->on(\App\Models\Tasks\Task::getModel()->getTable());

            $table->string('flag')->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('tasks_form', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id')->nullable(false);
            $table->foreign('task_id')->references('id')->on(\App\Models\Tasks\Task::getModel()->getTable());

            $table->json('fields')->nullable(false);
            $table->json('answers')->nullable(false);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('task_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id')->nullable(false);
            $table->foreign('task_id')->references('id')->on(\App\Models\Tasks\Task::getModel()->getTable());

            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on(\App\Models\User::getModel()->getTable());

            $table->unsignedSmallInteger('attempts')->nullable(false)->default(1)->comment('Количество попыток сдачи');
            $table->unsignedTinyInteger('solved')->nullable(false)->default(0)->comment('Флаг решения задачи');

            $table->timestamps();
        });

        Schema::create('task_user_difficulty', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id')->nullable(false);
            $table->foreign('task_id')->references('id')->on(\App\Models\Tasks\Task::getModel()->getTable());

            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on(\App\Models\User::getModel()->getTable());

            $table->unsignedTinyInteger('difficulty')->nullable(false)->comment('Сложность по мнению пользователя');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('task_user_difficulty');
        Schema::dropIfExists('tasks_ctf');
        Schema::dropIfExists('tasks_form');
        Schema::dropIfExists('task_answers');
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('task_types');
        Schema::dropIfExists('task_categories');
    }
};
