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
        $this->down();
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string("name", 250)->nullable(false);
            $table->decimal("price")->nullable(false);
            $table->integer("quantity")->nullable(false)->default(0);
            $table->char("type", 1)->nullable(false);
            $table->text("img");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
