<?php

use App\Models\Kategoriak;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('kategoriak', function (Blueprint $table) {
            $table->id();
            $table->string("nev");
            $table->timestamps();
        });

        Kategoriak::create(['id' => '1', 'nev' => 'Ház']);
        Kategoriak::create(['id' => '2', 'nev' => 'Lakás']);
        Kategoriak::create(['id' => '3', 'nev' => 'Építési telek']);
        Kategoriak::create(['id' => '4', 'nev' => 'Garázs']);
        Kategoriak::create(['id' => '5', 'nev' => 'Mezőgazdasági terület']);
        Kategoriak::create(['id' => '6', 'nev' => 'Ipari ingatlan']);
    }


    public function down(): void
    {
        Schema::dropIfExists('kategoriak');
    }
};
