<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("category");
            $table->timestamps();
        });

        DB::table('categories')->insert([
            ["category" => "Alimentos Refrigerados"],
            ["category" => "Alimentos No Refrigerados"],
            ["category" => "Productos de Limpieza"],
            ["category" => "Productos de Papelería"],
            ["category" => "Electrodomesticos"],
            ["category" => "Pedidos de Paquetería (Externos)"],
            ["category" => "Productos Quimicos o Farmacología"],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_');
    }
};
