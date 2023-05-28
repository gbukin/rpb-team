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
        Schema::create('events', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable(false);
            $table->string('description')->nullable(false);

            $table->dateTime('event_start')->nullable();
            $table->dateTime('event_end')->nullable();
            $table->dateTime('register_start')->nullable();
            $table->dateTime('register_end')->nullable();

            $table->unsignedTinyInteger('participation_type')->nullable(false)->comment('Тип участия: 0 - одиночный, 1 - командный');
            $table->string('stage')->nullable()->comment('Этап мероприятия');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
