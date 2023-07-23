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
        Schema::create('tasks_users_difficulty', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id')->nullable(false);
            $table->foreign('task_id')->references('id')->on(\App\Models\Tasks\Task::getModel()->getTable());

            $table->unsignedBigInteger('user_id')->nullable(false);
            $table->foreign('user_id')->references('id')->on(\App\Models\User::getModel()->getTable());

            $table->unsignedTinyInteger('difficulty')->nullable(false)->comment('Сложность по мнению пользователя');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks_users_difficulty');
    }
};
