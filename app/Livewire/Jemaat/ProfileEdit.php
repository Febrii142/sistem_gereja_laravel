<?php

namespace App\Livewire\Jemaat;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Jemaat;
use App\Models\Baptisan;

class ProfileEdit extends Component
{
    use WithFileUploads;

    public $nama_lengkap = '';
    public $nik = '';
    public $tempat_lahir = '';
    public $tanggal_lahir = '';
    public $jenis_kelamin = 'Laki-laki';
    public $alamat = '';
    public $no_telepon = '';
    public $no_hp = '';
    public $status_pernikahan = 'Belum Menikah';
    public $pekerjaan = '';
    public $pendidikan_terakhir = '';
    public $foto;
    public $foto_lama;

    // Baptisan
    public $tambah_baptisan = false;
    public $tanggal_baptis_baru = '';
    public $tempat_baptis_baru = '';
    public $pendeta_pembaptis_baru = '';

    public function mount()
    {
        $user = Auth::user();
        $jemaat = $user->jemaat;

        if (!$jemaat) {
            abort(403, 'Data jemaat tidak ditemukan.');
        }

        $this->nama_lengkap = $jemaat->nama_lengkap;
        $this->nik = $jemaat->nik ?? '';
        $this->tempat_lahir = $jemaat->tempat_lahir ?? '';
        $this->tanggal_lahir = $jemaat->tanggal_lahir ? $jemaat->tanggal_lahir->format('Y-m-d') : '';
        $this->jenis_kelamin = $jemaat->jenis_kelamin;
        $this->alamat = $jemaat->alamat ?? '';
        $this->no_telepon = $jemaat->no_telepon ?? '';
        $this->no_hp = $jemaat->no_hp ?? '';
        $this->status_pernikahan = $jemaat->status_pernikahan;
        $this->pekerjaan = $jemaat->pekerjaan ?? '';
        $this->pendidikan_terakhir = $jemaat->pendidikan_terakhir ?? '';
        $this->foto_lama = $jemaat->foto;
    }

    protected function rules(): array
    {
        $jemaatId = Auth::user()->jemaat?->id;

        $rules = [
            'nama_lengkap' => 'required|string|max:255',
            'nik' => 'nullable|string|max:16|unique:jemaats,nik,' . $jemaatId,
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'nullable|string',
            'no_telepon' => 'nullable|string|max:20',
            'no_hp' => 'nullable|string|max:20',
            'status_pernikahan' => 'required|in:Belum Menikah,Menikah,Duda,Janda',
            'pekerjaan' => 'nullable|string|max:255',
            'pendidikan_terakhir' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:2048',
        ];

        if ($this->tambah_baptisan) {
            $rules['tanggal_baptis_baru'] = 'required|date';
            $rules['tempat_baptis_baru'] = 'nullable|string|max:255';
            $rules['pendeta_pembaptis_baru'] = 'nullable|string|max:255';
        }

        return $rules;
    }

    public function save()
    {
        $this->validate();

        $user = Auth::user();
        $jemaat = $user->jemaat;

        if (!$jemaat) {
            abort(403);
        }

        $data = [
            'nama_lengkap' => $this->nama_lengkap,
            'nik' => $this->nik ?: null,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir ?: null,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'no_telepon' => $this->no_telepon,
            'no_hp' => $this->no_hp,
            'status_pernikahan' => $this->status_pernikahan,
            'pekerjaan' => $this->pekerjaan,
            'pendidikan_terakhir' => $this->pendidikan_terakhir,
        ];

        if ($this->foto) {
            $data['foto'] = $this->foto->store('jemaat', 'public');
        }

        $jemaat->update($data);

        // Add baptisan record if requested
        if ($this->tambah_baptisan && $this->tanggal_baptis_baru) {
            Baptisan::create([
                'jemaat_id' => $jemaat->id,
                'tanggal_baptis' => $this->tanggal_baptis_baru,
                'tempat_baptis' => $this->tempat_baptis_baru ?: null,
                'pendeta_pembaptis' => $this->pendeta_pembaptis_baru ?: null,
            ]);

            $jemaat->update(['tanggal_baptis' => $this->tanggal_baptis_baru]);
        }

        session()->flash('message', 'Profil berhasil diperbarui.');
        return redirect()->route('jemaat.profile');
    }

    public function render()
    {
        $user = Auth::user();
        $jemaat = $user->jemaat?->load('baptisans');

        return view('livewire.jemaat.profile-edit', [
            'jemaat' => $jemaat,
        ])->layout('layouts.app');
    }
}
