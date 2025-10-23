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
        Schema::create('resumes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('project_name', 255);
            $table->date('period_from');
            $table->date('period_to')->nullable();
            $table->text('description');
            $table->string('team', 255)->nullable();
            $table->string('industry', 100)->nullable();
            $table->string('employment', 100)->nullable();
            $table->string('language_fw', 255)->nullable();
            $table->string('database', 100)->nullable();
            $table->string('server_os', 100)->nullable();
            $table->string('cloud_env', 100)->nullable();
            $table->string('tools', 255)->nullable();
            $table->json('tasks_json')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->unique(['user_id', 'project_name'], 'user_project_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resumes');
    }
};
