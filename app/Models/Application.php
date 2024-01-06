<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name', 
        'office_address', 
        'interview_type',
        'job_description',
        'schedule_interview',
        'employer_response',
        'interview_step',
        'application_status', 
    ]; 
}
