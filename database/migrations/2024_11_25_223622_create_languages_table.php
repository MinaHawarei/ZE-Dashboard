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
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('abbr',10)->nullable();
            $table->string('local',20)->nullable();;
            $table->string('name',100)->nullable();
            $table->string('native',100)->nullable();
            $table->longText('flag')->nullable();
            $table->enum('direction',['ltr','rtl'])->default('ltr');
            $table->enum('active',[0,1])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
