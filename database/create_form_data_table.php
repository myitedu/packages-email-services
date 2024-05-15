<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormDataTable extends Migration
{
    public function up()
    {
        Schema::create('form_data', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->string('form_id', 250)->nullable();
            $table->string('field_name', 255)->nullable();
            $table->text('field_value')->nullable();
            $table->timestamp('email_sent')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('form_data');
    }
}
