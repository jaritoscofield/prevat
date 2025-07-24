<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Reports\TrainingReport;
use App\Repositories\Reports\CompaniesReport;
use App\Repositories\SchedulePrevatRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class DashboardExportController extends Controller
{
    public function export(Request $request)
    {
        $now = Carbon::now();
        $start = $now->copy()->startOfMonth()->format('Y-m-d');
        $end = $now->copy()->endOfMonth()->format('Y-m-d');
        $dates = $start . ' to ' . $end;

        // Treinamentos ministrados
        $trainingReport = new TrainingReport();
        $trainings = $trainingReport->index(null, ['dates' => $dates], null)['data'];

        // Empresas atendidas (empresas com agendamento no mês)
        $companies = $trainings->pluck('company')->unique('id');

        // Turmas extras (type = 'Fechado')
        $schedulePrevatRepo = new SchedulePrevatRepository();
        $orderBy = ['column' => 'date_event', 'order' => 'DESC'];
        $turmasExtras = collect($schedulePrevatRepo->index($orderBy, null, null)['data'] ?? [])->filter(function($item) use ($start, $end) {
            return $item->type === 'Fechado' && $item->date_event >= $start && $item->date_event <= $end;
        });

        $pdf = Pdf::loadView('admin.pdf.dashboard_export', [
            'trainings' => $trainings,
            'companies' => $companies,
            'turmasExtras' => $turmasExtras,
            'start' => $start,
            'end' => $end,
        ]);
        return $pdf->download('dashboard_export_' . $now->format('Y_m') . '.pdf');
    }
} 