<?php
use App\Models\Provider;
use App\Models\User;
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
        User::create([
            "name" => "Jefe de Almacén",
            "email" => "almacenhr@hotelrealdepuebla.com.mx",
            "password" => "almacen2024"
        ]);

        DB::table("providers")->insert([
            [
                "name" => "Juan Flores",
                "company" => "Bonafont",
                "email" => "bonafontmx@gmail.com",
                "telephone" => "55909218"
            ],
            [
                "name" => "Carlos Villegaz",
                "company" => "Member´s Mark",
                "email" => "members@membersmx.com.mx",
                "telephone" => "221197865"
            ],
            [
                "name" => "Marco Torres",
                "company" => "Jumez",
                "email" => "jumexmx@jumex.com.mx",
                "telephone" => "2467189023"
            ],
            [
                "name" => "Sebastian Martinez",
                "company" => "Unifi",
                "email" => "unifi@network.com.mx",
                "telephone" => "7189652941"
            ],
            [
                "name" => "Marcedonio Contreras",
                "company" => "Tortillería Contreras",
                "email" => "tortilleriacontreras12@gmail.com",
                "telephone" => "2481744109"
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('database', function (Blueprint $table) {
            //
        });
    }
};
