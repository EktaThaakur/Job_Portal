<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('company', function (Blueprint $table) {
            $table->bigIncrements('company_id')->primary();
            $table->string('company_name');
            $table->text('company_detail');
            $table->string('company_address');
            $table->string('company_logo');
            $table->timestamps();

        });
        Schema::create('job', function (Blueprint $table) {
            $table->bigIncrements('job_id')->primary();
            $table->string('job_name');
            $table->text('job_description');
            $table->string('qualifications');
            $table->text('responsibility');
            $table->date('published_date');
            $table->unsignedInteger('vacancy');
            $table->string('job_nature');
            $table->decimal('salary', 8, 2)->nullable();
            $table->string('location');
            $table->date('date_line')->nullable();
            //use foreign key
            $table->foreignId('company_id');
            // $table->unsignedInteger('available_at')->nullable(); 
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};