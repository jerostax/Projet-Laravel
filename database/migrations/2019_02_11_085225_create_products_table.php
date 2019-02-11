<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 6, 2)->nullable();
            $table->enum('size', [46, 48, 50, 52]);
            $table->string('url_image', 100);
            $table->enum('status', ['publié', 'brouillon'])->default('brouillon');
            $table->enum('code', ['SOLDE', 'NEW'])->default('SOLDE');
            $table->string('reference', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
