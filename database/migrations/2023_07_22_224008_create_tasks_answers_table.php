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
        Schema::create('task_answers', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id')->nullable(false);
            $table->foreign('task_id')->references('id')->on(\App\Models\Tasks\Task::getModel()->getTable());

            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on(\App\Models\User::getModel()->getTable());

            $table->unsignedSmallInteger('attempts')->nullable(false)->default(1)->comment('Количество попыток сдачи');
            $table->unsignedTinyInteger('solved')->nullable(false)->default(0)->comment('Флаг решения задачи');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks_answers');
    }
};
