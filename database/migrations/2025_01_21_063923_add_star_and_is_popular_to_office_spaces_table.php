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
        Schema::table('office_spaces', function (Blueprint $table) {
            $table->string('star')->after('about');
            $table->boolean('is_popular')->after('star');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('office_spaces', function (Blueprint $table) {
            $table->dropColumn('star');
            $table->dropColumn('is_popular');
        });
    }
};
