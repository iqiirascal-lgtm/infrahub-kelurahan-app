<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            // Tambah kolom facility_category_id
            $table->foreignId('facility_category_id')->nullable()->after('user_id')->constrained('facility_categories')->onDelete('set null');
            
            // Hapus kolom category lama (jika ada)
            $table->dropColumn('category');
        });
    }

    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropForeign(['facility_category_id']);
            $table->dropColumn('facility_category_id');
            $table->string('category')->nullable();
        });
    }
};