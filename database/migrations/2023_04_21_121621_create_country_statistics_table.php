<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    public function up(): void
    {
        Schema::create('country_statistics', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->integer('confirmed');
            $table->integer('recovered');
            $table->integer('deaths');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('country_statistics');
    }
};
