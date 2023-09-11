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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('nick_name')->nullable();

            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->unsignedBigInteger('role_id')->nullable();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

            $table->unsignedBigInteger('designation_id')->nullable();
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');

            $table->unsignedBigInteger('location_id')->nullable();
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

            $table->unsignedBigInteger('job_status_id')->nullable();
            $table->foreign('job_status_id')->references('id')->on('job_statuses')->onDelete('cascade');

            $table->enum('employee_status',['active','terminated','deceased', 'resigned', 'probation', 'notice_period'])->default('male');

            $table->unsignedBigInteger('source_hire_id')->nullable();
            $table->foreign('source_hire_id')->references('id')->on('job_statuses')->onDelete('cascade');

            $table->date('date_of_joining')->nullable();
            $table->year('current_experience')->nullable();
            $table->year('total_experience')->nullable();
            $table->date('dob')->nullable();
            $table->longText('ask_me_about')->nullable();
            $table->enum('gender',['male','female','other'])->default('male');
            $table->enum('marital_status',['single','married', 'divorced'])->default('single');
            $table->string('work_phone_number')->nullable();
            $table->string('personal_phone_number')->nullable();
            $table->string('personal_email_address')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->date('date_of_exit')->nullable();

            $table->unsignedBigInteger('added_by')->nullable();
            $table->foreign('added_by')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('modified_by')->nullable();
            $table->foreign('modified_by')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('employees');
    }
};
