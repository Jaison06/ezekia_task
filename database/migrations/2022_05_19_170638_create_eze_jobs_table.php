<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEzeJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eze_jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('candidate_id');
            $table->string('job_title');
            $table->string('company_name');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eze_jobs');
    }
}
