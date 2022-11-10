<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubCategoryTable extends Migration
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
            if(!Schema::hasTable('sub_categories')) {
                Schema::create('sub_categories', function (Blueprint $table) {
                    $table->id();
                    $table->bigInteger('category_id')->unsigned();
                    $table->string('name', 200);
                    $table->timestamps();

                    if(Schema::hasTable('categories')) {
                        $table->foreign('category_id')->references('id')->on('categories');
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
        Schema::dropIfExists('sub_categories');
    }
}
