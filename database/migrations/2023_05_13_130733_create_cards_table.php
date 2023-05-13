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
        Schema::create('card', function (Blueprint $table) {
            $table->id();
            $table->integer("card_number")->nullable(false);
            $table->foreignId('id_client')->constrained('client');
            $table->string("cpf_client", 11)->nullable(false);
            $table->date("card_expire_date")->nullable(false);
            $table->integer("cvv_card")->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card');
    }
};
