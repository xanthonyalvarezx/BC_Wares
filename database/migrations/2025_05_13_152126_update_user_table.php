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
        Schema::table('users',   function (Blueprint $table) {
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('addresslinetwo')->nullable();
            $table->string('addresslinethree')->nullable();
            $table->string('state');
            $table->integer('postcode');
            $table->string('business');
            $table->integer('producttype');
            $table->integer('policy')->default(0);
            $table->integer('terms')->default(0);
            $table->boolean('vendor')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('address');
            $table->dropColumn('addresslinetwo');
            $table->dropColumn('addresslinethree');
            $table->dropColumn('state');
            $table->dropColumn('postcode');
            $table->dropColumn('business');
            $table->dropColumn('producttype');
            $table->dropColumn('policy');
            $table->dropColumn('terms');
        });
    }
};
