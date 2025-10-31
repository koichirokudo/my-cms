<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (!Schema::hasColumn('blogs', 'excerpt')) {
                $table->string('excerpt', 255)->after('title');
            }
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            if (Schema::hasColumn('blogs', 'excerpt')) {
                $table->dropColumn('excerpt');
            }
        });
    }
};
