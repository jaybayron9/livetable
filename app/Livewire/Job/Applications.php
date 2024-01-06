<?php

namespace App\Livewire\Job;

use Livewire\Component;
use App\Models\Application;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;

class Applications extends Component
{
    use WithPagination;

    #[Validate('required')]
    public $company_name;

    public $office_address;

    #[Validate('required')]
    public $interview_type;

    #[Validate('required')]
    public $job_description;

    #[Validate('required')]
    public $schedule_interview;

    public $employer_response;

    #[Validate('required')]
    public $interview_step;

    #[Validate('required')]
    public $application_status;
    public $description;    

    public function save(Application $job) 
    { 
        $job->create($this->validate());
        $this->reset();
    } 

    public function upapp_status($id, $selectedValue) {
        Application::where('id', $id)->update([
            'application_status' => $selectedValue
        ]);
    } 

    public function upinterview_step($id, $selectedValue) {
        Application::where('id', $id)->update([
            'interview_step' => $selectedValue
        ]);
    }

    public function view_description($id) {
        $this->description = Application::find($id);
        $this->description->select('job_description')
                            ->first();  
    }

    public function remove_job($id) {
        Application::find($id)->delete();
    }

    public function render()
    {
        return view('livewire.job.applications', [
            'jobs' => Application::paginate(9)
        ]);
    }
}
