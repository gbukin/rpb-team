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
        Schema::create('tasks_ctf', function (Blueprint $table) {
            $table->unsignedBigInteger('task_id')->nullable(false);
            $table->foreign('task_id')->references('id')->on(\App\Models\Tasks\Task::getModel()->getTable());

            $table->string('flag')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks_ctf');
    }
};
