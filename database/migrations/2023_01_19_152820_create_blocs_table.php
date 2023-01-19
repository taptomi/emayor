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
        Schema::create('blocs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('organization_id')->references('id')->on('organizations')->cascadeOnDelete();
            $table->string('shortname')->limit(50);
            $table->string('title')->nullable()->limit(50);
            $table->string('content')->limit(250);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blocs');
    }
};
