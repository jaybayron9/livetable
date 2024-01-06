<div> 
    <div class="flex"> 
        <form wire:submit="save">
            <h3>Application Form</h3>
            <div class="field">
                <label for="company-name">Company Name:</label>
                <input type="text"
                        wire:model="company_name">
                @error('company_name')<span>{{ $message }}</span>@enderror
            </div>
            <div class="field">
                <label for="interview-type">Interview Type:</label>
                <select wire:model="interview_type">
                    <option value="" selected hidden>Select type</option>
                    <option value="virtual">virtual</option>
                    <option value="onsite">onsite</option>
                </select>
                @error('interview_type')<span>{{ $message }}</span>@enderror
            </div>
            <div class="field">
                <label for="job-description">Job Description:</label>
                <textarea wire:model="job_description" cols="30" rows="10"></textarea>
                @error('job_description')<span>{{ $message }}</span>@enderror
            </div>
            <div class="field">
                <label for="schedule">Shedule</label>
                <input type="datetime-local"
                        wire:model="schedule_interview">
                @error('schedule_interview')<span>{{ $message }}</span>@enderror
            </div>
            <div class="field">
                <label for="employer-response">Employer response:</label>
                <input type="text"
                        wire:model="employer_response">
                @error('employer_response')<span>{{ $message }}</span>@enderror
            </div>
            <div class="field">
                <label for="interview-step">Interview Step:</label>
                <select wire:model="interview_step">
                    <option value="" selected hidden>Select Step</option>
                    <option value="initial">initial</option>
                    <option value="final">final</option>
                </select>
                @error('interview_step')<span>{{ $message }}</span>@enderror
            </div>
            <div class="field">
                <label for="application-status">Status:</label>
                <select type="text"
                        wire:model="application_status"> 
                    <option value="" selected hidden>Select status</option>
                    <option value="inactive">inactive</option>
                    <option value="active">active</option>
                </select>  
                @error('application_status')<span>{{ $message }}</span>@enderror
            </div>
            <button type="submit" class="btn btn-primary">
                Save
            </button>
        </form> 
    
        <div> 
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left dark:text-gray-400">
                    <thead class="text-xs uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="text-center font-medium px-5">Company</th>
                            <th class="text-center font-medium px-5">Address</th>
                            <th class="text-center font-medium px-5">Type</th>
                            <th class="text-center font-medium px-5">Description</th>
                            <th class="text-center font-medium px-5">Schedule</th>
                            <th class="text-center font-medium px-5">Response</th>
                            <th class="text-center font-medium px-5">Step</th>
                            <th class="text-center font-medium px-5">Status</th>
                            <th class="text-center font-medium px-5">Created</th>
                            <th class="text-center font-medium px-5">Updated</th>
                            <th class="text-center font-medium px-5">Actions</th>
                        </tr>
                    </thead>
                    <tbody> 
                        @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $job->company_name }}</td>
                            <td>{{ $job->office_address }}</td>
                            <td>{{ $job->interview_type }}</td>
                            <td>
                                <button wire:click="view_description({{ $job->id }})">View</button>
                            </td>
                            <td>{{ $job->schedule_interview }}</td>
                            <td>{{ $job->employer_response }}</td>
                            <td>
                                <select class="interviewStatus" data-row-data="{{ $job->id }}">
                                    <option value="" selected hidden>{{ $job->interview_step }}</option>
                                    <option value="initial">initial</option>
                                    <option value="final">final</option>
                                </select> 
                            </td>
                            <td>
                                <select class="statusSelect" data-row-data="{{ $job->id }}">
                                    <option selected hidden>{{ $job->application_status }}</option>
                                    <option value="inactive">inactive</option>
                                    <option value="active">active</option>
                                </select>   
                            </td>
                            <td>{{ $job->created_at }}</td>
                            <td>{{ $job->updated_at }}</td>
                            <td> 
                                <button wire:click="remove_job({{ $job->id }})"
                                        wire:confirm="Are you sure, you want to delete this job?">
                                    remove
                                </button>
                            </td>
                        </tr>  
                        @endforeach 
                    </tbody>
                </table> 
            </div>
            <div class="pagination">
                {{ $jobs->links('vendor.livewire.simple-bootstrap') }}
            </div>
        </div>
    </div>

    <div class="job-description">
        <h3>Job Description</h3>
        <p>
            {{ $description['job_description'] ?? '' }}
        </p>
    </div> 
    <script>
        document.querySelectorAll('.interviewStatus').forEach(function(selectElement) {
            selectElement.addEventListener('change', function(e) {
                var selectedValue = e.target.value;
                var id = this.getAttribute('data-row-data');

                @this.upinterview_step(id, selectedValue);
            });
        });

        document.querySelectorAll('.statusSelect').forEach(function(selectElement) {
            selectElement.addEventListener('change', function (e) { 
                var selectedValue = e.target.value; 
                var id = this.getAttribute('data-row-data');

                @this.upapp_status(id, selectedValue);
            });
        });
        
    </script> 
</div> 