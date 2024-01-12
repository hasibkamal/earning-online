<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppearanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appearance', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->longText('description')->nullable();
            $table->string('logo')->nullable();
            $table->string('website')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('chairman_photo')->nullable();
            $table->string('chairman_name')->nullable();
            $table->longText('chairman_message')->nullable();

            $table->string('saturday')->nullable();
            $table->string('sunday')->nullable();
            $table->string('monday')->nullable();
            $table->string('tuesday')->nullable();
            $table->string('wednesday')->nullable();
            $table->string('thursday')->nullable();
            $table->string('friday')->nullable();

            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('google_plus')->nullable();
            $table->string('youtube')->nullable();

            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('is_archive')->default(0);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('appearance');
    }
}
