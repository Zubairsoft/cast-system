<?php

use Domains\Contact\Enums\ContactStatus;
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
        Schema::create('contact_us', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('sender');
            $table->string('phone');
            $table->string('email');
            $table->uuid('contact_list_id');
            $table->string('problem');
            $table->string('message');
            $table->smallInteger('status')->default(ContactStatus::NEW);

            $table->foreign('contact_list_id')->references('id')->on('contact_lists')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_us');
    }
};
