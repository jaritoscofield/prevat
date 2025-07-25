<?php

namespace App\Livewire\Client\ScheduleCompany;

use App\Repositories\ScheduleCompanyRepository;
use Livewire\Component;

class View extends Component
{
    public $schedule;

    public function mount($reference = null)
    {
        $scheduleCompanyRepository = new ScheduleCompanyRepository();
        $scheduleCompanyReturnDB = $scheduleCompanyRepository->showByReference($reference)['data'];

        if($scheduleCompanyReturnDB) {
            $this->schedule = $scheduleCompanyReturnDB;

        }
    }

    public function render()
    {
        return view('livewire.client.schedule-company.view');
    }
}
