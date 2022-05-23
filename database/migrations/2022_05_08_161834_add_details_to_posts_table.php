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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('post_type');
            $table->string('title');
            $table->string('condition');
            $table->string('category');
            $table->decimal('price');
            $table->binary('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('post_type');
            $table->dropColumn('title');
            $table->dropColumn('condition');
            $table->dropColumn('category');
            $table->dropColumn('price');
            $table->dropColumn('image');
        });
    }
};
