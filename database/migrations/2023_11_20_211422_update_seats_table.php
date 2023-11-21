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
        //
        Schema::table('seats', function (Blueprint $table) {
            $table->dropColumn('price');
            $table->unsignedBigInteger('type_seat')->change();
            $table->foreign('type_seat')->references('id')->on('seat_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('seats', function(Blueprint $table){
            $table->dropForeign(['type_seat']);
            $table->string('type_seat')->change();
            
            // Tạo lại cột 'price'
            $table->double('price');
        });
    }
};
