<?php

namespace App\Livewire\Jemaat;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public function render()
    {
        $user = Auth::user();
        $jemaat = $user->jemaat?->load(['baptisans', 'keluarga']);

        return view('livewire.jemaat.profile', [
            'jemaat' => $jemaat,
        ])->layout('layouts.app');
    }
}
