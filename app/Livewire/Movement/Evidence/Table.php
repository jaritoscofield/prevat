<?php

namespace App\Livewire\Movement\Evidence;

use App\Models\Evidence;
use App\Models\TrainingParticipations;
use App\Repositories\Movements\EvidenceRepository;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;

class Table extends Component
{
    use WithPagination;

    public $order = [
        'column' => 'created_at',
        'order' => 'DESC'
    ];

    public $filters;

    public $pageSize = 15;

    #[On('filterTableEvidences')]
    public function filterTableEvidences($filterData = null)
    {
        $this->filters = $filterData;
    }

    #[On('clearFilter')]
    public function clearFilter($visible = null)
    {
        $this->filters = null;
    }

    #[On('getEvidences')]
    public function getEvidences()
    {
        $evidenceRepository = new EvidenceRepository();
        $evidenceReturnDB = $evidenceRepository->index($this->order, $this->filters, $this->pageSize)['data'];

        return $evidenceReturnDB;
    }

    #[On('confirmDeleteEvidence')]
    public function delete($id = null)
    {
        $evidenceRepository = new EvidenceRepository();
        $evidenceReturnDB = $evidenceRepository->delete($id);

        if($evidenceReturnDB['status'] == 'success') {
            return redirect()->route('movement.evidence')->with($evidenceReturnDB['status'], $evidenceReturnDB['message']);
        } else if ($evidenceReturnDB['status'] == 'error') {
            return redirect()->back()->with($evidenceReturnDB['status'], $evidenceReturnDB['message']);
        }
    }

    public function downloadPDF($evidence_id)
    {
        $evidenceDB = Evidence::query()->withoutGlobalScopes()->findOrFail($evidence_id);
        
        // Log do caminho do arquivo no banco de dados
        \Log::info('File path from DB: ' . $evidenceDB['file_path']);
        
        // Construir o caminho completo usando public_path
        $fullPath = public_path('storage/' . $evidenceDB['file_path']);
        
        // Log do caminho completo
        \Log::info('Full path: ' . $fullPath);
        
        // Verificar se o diretório existe
        $dirPath = dirname($fullPath);
        \Log::info('Directory exists: ' . (is_dir($dirPath) ? 'Yes' : 'No'));
        \Log::info('Directory path: ' . $dirPath);
        
        // Listar arquivos no diretório
        if (is_dir($dirPath)) {
            \Log::info('Files in directory: ' . implode(', ', scandir($dirPath)));
        }
        
        if (!file_exists($fullPath)) {
            \Log::error('File not found at path: ' . $fullPath);
            session()->flash('error', 'Arquivo não encontrado.');
            return null;
        }

        return response()->download($fullPath);
    }

    public function render()
    {
        $response = new \stdClass();
        $response->evidences = $this->getEvidences();

        return view('livewire.movement.evidence.table', ['response' => $response]);
    }
}
