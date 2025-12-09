<?php

namespace App\Livewire\Jemaat;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Jemaat;
use App\Models\Komsel;

class Create extends Component
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
    public $email = '';
    public $status_pernikahan = 'Belum Menikah';
    public $pekerjaan = '';
    public $pendidikan_terakhir = '';
    public $status_keanggotaan = 'Calon Anggota';
    public $tanggal_baptis = '';
    public $tanggal_sidi = '';
    public $foto;
    public $is_active = true;
    public $komsel_id = '';

    protected $rules = [
        'nama_lengkap' => 'required|string|max:255',
        'nik' => 'nullable|string|max:16|unique:jemaats,nik',
        'tempat_lahir' => 'nullable|string|max:255',
        'tanggal_lahir' => 'nullable|date',
        'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
        'alamat' => 'nullable|string',
        'no_telepon' => 'nullable|string|max:20',
        'no_hp' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255|unique:jemaats,email',
        'status_pernikahan' => 'required|in:Belum Menikah,Menikah,Duda,Janda',
        'pekerjaan' => 'nullable|string|max:255',
        'pendidikan_terakhir' => 'nullable|string|max:255',
        'status_keanggotaan' => 'required|in:Calon Anggota,Anggota Baptis,Anggota Sidi,Anggota Pindahan',
        'tanggal_baptis' => 'nullable|date',
        'tanggal_sidi' => 'nullable|date',
        'foto' => 'nullable|image|max:2048',
        'is_active' => 'boolean',
        'komsel_id' => 'nullable|exists:komsels,id',
    ];

    public function save()
    {
        $this->validate();

        $data = [
            'nama_lengkap' => $this->nama_lengkap,
            'nik' => $this->nik,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'no_telepon' => $this->no_telepon,
            'no_hp' => $this->no_hp,
            'email' => $this->email,
            'status_pernikahan' => $this->status_pernikahan,
            'pekerjaan' => $this->pekerjaan,
            'pendidikan_terakhir' => $this->pendidikan_terakhir,
            'status_keanggotaan' => $this->status_keanggotaan,
            'tanggal_baptis' => $this->tanggal_baptis,
            'tanggal_sidi' => $this->tanggal_sidi,
            'is_active' => $this->is_active,
            'komsel_id' => $this->komsel_id,
        ];

        if ($this->foto) {
            $data['foto'] = $this->foto->store('jemaat', 'public');
        }

        Jemaat::create($data);

        session()->flash('message', 'Jemaat berhasil ditambahkan.');
        return redirect()->route('jemaat.index');
    }

    public function render()
    {
        $komsels = Komsel::where('is_active', true)->get();
        
        return view('livewire.jemaat.create', [
            'komsels' => $komsels,
        ])->layout('layouts.app');
    }
}
