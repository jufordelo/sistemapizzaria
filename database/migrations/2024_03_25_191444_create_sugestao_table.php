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
        Schema::disableForeignKeyConstraints();

        Schema::create('sugestao', function (Blueprint $table) {
            $table->id();
            $table->string('assunto', 120);
            $table->string('tipo', 50);
            $table->text('comentario');
            $table->foreignId ('categoria_sugestao_id')->nullable()
                  ->constrained('categoria_sugestao')->after('id');
            $table->timestamps();
        });


      Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sugestao');
    }
};
