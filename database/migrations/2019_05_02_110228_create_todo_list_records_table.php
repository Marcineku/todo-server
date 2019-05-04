<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodoListRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_list_records', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content')->nullable();
            $table->boolean('is_done')->default(false);
            $table->unsignedBigInteger('list_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('list_id')->references('id')->on('todo_lists')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todo_list_records');
    }
}
