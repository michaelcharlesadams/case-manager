<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('matter_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('matter_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('role_on_matter')->nullable(); // lead, co-counsel, paralegal, etc.
            $table->timestamps();
            $table->unique(['matter_id','user_id']);
        });
    }
    public function down(): void { Schema::dropIfExists('matter_user'); }
};
