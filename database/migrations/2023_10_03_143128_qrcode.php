<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Qrcode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('business_id');
            $table->text('qr_content');
            $table->string('image_path', 255);
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->enum('status', ['pending', 'paid', 'used']);
            $table->foreign('business_id')->references('id')->on('business');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
