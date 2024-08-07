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



    {   Schema::disableForeignKeyConstraints();
        Schema::create('personalizados', function (Blueprint $table) {
            $table->id();
            $table->string('nomec',100);
            $table->string("kg",14);
            $table->string("tel",40);
            $table->string("horareti",5);
            $table->string("datareti",10);
            $table->string("obs",40);
            $table->foreignId ('categoria_personalizados_id')->nullable()
            ->constrained('categoria_personalizados')->after('id');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personalizado');
    }
};
