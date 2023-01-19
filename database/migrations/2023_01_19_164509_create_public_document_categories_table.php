<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('public_document_categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('parent_id')->nullable();

            $table->string('title')->limit(50);
            $table->string('description')->limit(50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_document_categories');
    }
};
