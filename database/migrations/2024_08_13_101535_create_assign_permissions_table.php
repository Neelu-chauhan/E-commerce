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
        Schema::create('assign_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id_fk')->constrained()->onDelete('cascade');
            $table->foreignId('permission_id_fk')->constrained()->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_permissions');
    }
};
