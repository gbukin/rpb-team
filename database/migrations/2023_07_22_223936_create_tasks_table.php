<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
