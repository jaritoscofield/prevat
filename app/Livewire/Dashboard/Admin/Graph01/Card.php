<?php

namespace App\Livewire\Dashboard\Admin\Graph01;

use Livewire\Component;

class Card extends Component
{
    public $trainingsThisMonth;
    public $trainingsLastMonth;

    public function render()
    {
        $this->trainingsThisMonth = $this->getTrainingsThisMonth();
        $this->trainingsLastMonth = $this->getTrainingsLastMonth();
        return view('livewire.dashboard.admin.graph01.card', [
            'trainingsThisMonth' => $this->trainingsThisMonth,
            'trainingsLastMonth' => $this->trainingsLastMonth,
        ]);
    }

    private function getTrainingsThisMonth()
    {
        $start = now()->startOfMonth();
        $end = now()->endOfMonth();
        return \App\Models\SchedulePrevat::where('status', 'Concluído')
            ->whereBetween('date_event', [$start, $end])
            ->count();
    }

    private function getTrainingsLastMonth()
    {
        $start = now()->subMonth()->startOfMonth();
        $end = now()->subMonth()->endOfMonth();
        return \App\Models\SchedulePrevat::where('status', 'Concluído')
            ->whereBetween('date_event', [$start, $end])
            ->count();
    }
}
