<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            if(!Schema::hasTable('products')) {
                Schema::create('products', function (Blueprint $table) {
                    $table->id();
                    $table->string('name', 200);
                    $table->string('image', 300)->nullable();
                    $table->longText('description');
                    $table->timestamps();
                });
            }
        } catch(\Exception $e) {
            echo "something went wrong, check logs";
            Log::info($e);
        }
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
