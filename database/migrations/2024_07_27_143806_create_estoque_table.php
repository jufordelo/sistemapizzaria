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

        Schema::create('estoque', function (Blueprint $table) {
            $table->id();
            $table->string('mprima', 120);
            $table->string('tipo', 50);
            $table->text('validade');
            $table->text('quantidade');
            $table -> string ('imagem') -> nullable();
            $table->foreignId ('categoria_estoque_id')->nullable()
                  ->constrained('categoria_estoque')->after('id');
            $table->timestamps();
        });


      Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estoque');
    }
};







    /**
     * Run the migrations.
     */
    //public function up(): void
   // {
//Schema::create('estoques', function (Blueprint $table) {
            //$table->id();
           // $table->timestamps();
      //  });
   // }

    /**
     * Reverse the migrations.
     */
  //  public function down(): void
  //  {
   //     Schema::dropIfExists('estoques');
  //  }

