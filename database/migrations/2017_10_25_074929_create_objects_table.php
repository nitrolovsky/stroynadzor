<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objects', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('developer_name')->nullable();
            $table->text('address')->nullable();
            $table->string('area')->nullable();
            $table->string('coast')->nullable();

            $table->string('resolution_number')->nullable();
            $table->string('resolution_deadline')->nullable();

            $table->unsignedInteger('inspector_id')->nullable();

            $table->string('status')->nullable();
            $table->dateTime('status_deadline')->nullable();
            $table->dateTime('status_start')->nullable();

            $table->string('contact_fio')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('contact_email')->nullable();

            $table->text('note')->nullable();

            $table->string('video_url')->nullable();

            $table->unsignedInteger('stroyform_id')->nullable();

            $table->string('notice_date_added')->nullable();
            $table->string('checklist_date_added')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('objects');
    }
}
