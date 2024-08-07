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
    {//database/migration


        Schema::disableForeignKeyConstraints();

        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->string('resp',100);
            $table->string("tel",40);
            $table->string("data",10);
            $table->string("hora",5);
            $table->string("pss",16);
            $table->foreignId ('categoria_reserva_id')->nullable()
                ->constrained('categoria_reservas')->after('id');
            $table->timestamps();
        });

      Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserva');
    }
};
