<?php

namespace App\Livewire\Dashboard\Admin\Info;

use Livewire\Component;

class Card extends Component
{
    public $trainingsMonth;
    public $companiesMonth;
    public $extraClassesMonth;

    public function render()
    {
        $this->trainingsMonth = $this->getTrainingsMonth();
        $this->companiesMonth = $this->getCompaniesMonth();
        $this->extraClassesMonth = $this->getExtraClassesMonth();
        return view('livewire.dashboard.admin.info.card');
    }

    // Treinamentos ministrados no mês
    private function getTrainingsMonth()
    {
        $start = now()->startOfMonth();
        $end = now()->endOfMonth();
        return \App\Models\SchedulePrevat::where('status', 'Concluído')
            ->whereBetween('date_event', [$start, $end])
            ->count();
    }
    // Empresas atendidas no mês
    private function getCompaniesMonth()
    {
        $start = now()->startOfMonth();
        $end = now()->endOfMonth();
        return \App\Models\ScheduleCompany::whereHas('schedule', function($q) use ($start, $end) {
                $q->where('status', 'Concluído')
                  ->whereBetween('date_event', [$start, $end]);
            })
            ->distinct('company_id')
            ->count('company_id');
    }
    // Turmas extras no mês (type = 'Fechado')
    private function getExtraClassesMonth()
    {
        $start = now()->startOfMonth();
        $end = now()->endOfMonth();
        return \App\Models\SchedulePrevat::where('status', 'Concluído')
            ->where('type', 'Fechado')
            ->whereBetween('date_event', [$start, $end])
            ->count();
    }
}
