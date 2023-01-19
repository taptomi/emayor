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
        Schema::create('public_documents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('organization_id')->on('organizations')->deleteOnCascade();
            $table->foreignId('category_id')->on('public_document_categories')->deleteOnCascade();
            $table->string('title')->nullable();
            $table->string('filename');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('public_documents');
    }
};
