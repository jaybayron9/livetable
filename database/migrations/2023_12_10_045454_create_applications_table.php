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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('office_address')->nullable();
            $table->string('interview_type');
            $table->longText('job_description');
            $table->dateTime('schedule_interview');
            $table->string('employer_response')->nullable();
            $table->string('interview_step');
            $table->string('application_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
