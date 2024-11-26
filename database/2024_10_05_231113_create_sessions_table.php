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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->nullable(); // عنوان IP
            $table->text('user_agent')->nullable(); // معلومات المتصفح ونظام التشغيل
            $table->string('device')->nullable(); // نوع الجهاز (موبايل/كمبيوتر)
            $table->string('platform')->nullable(); // نظام التشغيل
            $table->string('browser')->nullable(); // اسم المتصفح
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
