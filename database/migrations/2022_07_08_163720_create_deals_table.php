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
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('price');
            $table->integer('responsible_user_id');
            $table->integer('group_id')->default(0);
            $table->integer('status_id');
            $table->integer('pipeline_id');
            $table->integer('loss_reason_id')->nullable()->default(null);
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->timestamps();            
            $table->timestamp('closed_at')->nullable()->default(null);
            $table->timestamp('closest_task_at')->nullable()->default(null);
            $table->boolean('is_deleted')->default(false);
            $table->integer('score')->nullable()->default(null);
            $table->integer('account_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deals');
    }
};
