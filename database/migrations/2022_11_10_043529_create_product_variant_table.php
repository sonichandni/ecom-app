<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            Schema::enableForeignKeyConstraints();
            if(!Schema::hasTable('product_variant')) {
                Schema::create('product_variant', function (Blueprint $table) {
                    $table->id();
                    $table->bigInteger('product_id')->unsigned();
                    $table->string('name', 200);
                    $table->decimal('price', 10,2);
                    $table->decimal('offer_price', 10,2);
                    $table->timestamps();

                    if(Schema::hasTable('products')) {
                        $table->foreign('product_id')->references('id')->on('products');
                    }
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
        Schema::dropIfExists('product_variant');
    }
}
