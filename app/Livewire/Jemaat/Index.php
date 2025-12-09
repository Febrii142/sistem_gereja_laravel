<?php

namespace App\Livewire\Jemaat;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Jemaat;
use App\Models\Komsel;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $filterStatus = '';
    public $filterKomsel = '';
    public $confirmingDeletion = false;
    public $jemaatToDelete = null;

    protected $queryString = ['search', 'filterStatus', 'filterKomsel'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingFilterStatus()
    {
        $this->resetPage();
    }

    public function updatingFilterKomsel()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->jemaatToDelete = $id;
        $this->confirmingDeletion = true;
    }

    public function delete()
    {
        if ($this->jemaatToDelete) {
            Jemaat::find($this->jemaatToDelete)->delete();
            $this->confirmingDeletion = false;
            $this->jemaatToDelete = null;
            session()->flash('message', 'Jemaat berhasil dihapus.');
        }
    }

    public function render()
    {
        $query = Jemaat::query();

        if ($this->search) {
            $query->where(function ($q) {
                $q->where('nama_lengkap', 'like', '%' . $this->search . '%')
                  ->orWhere('nik', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%')
                  ->orWhere('no_hp', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->filterStatus !== '') {
            $query->where('is_active', $this->filterStatus);
        }

        if ($this->filterKomsel) {
            $query->where('komsel_id', $this->filterKomsel);
        }

        $jemaats = $query->latest()->paginate(10);
        $komsels = Komsel::where('is_active', true)->get();

        return view('livewire.jemaat.index', [
            'jemaats' => $jemaats,
            'komsels' => $komsels,
        ])->layout('layouts.app');
    }
}
