<?php

namespace App\Livewire\Jemaat;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Jemaat;
use App\Models\Baptisan;
use App\Models\Keluarga;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class Register extends Component
{
    use WithFileUploads;

    // Account info
    public $email = '';
    public $password = '';
    public $password_confirmation = '';

    // Personal info
    public $nama_lengkap = '';
    public $no_hp = '';
    public $nik = '';
    public $alamat = '';
    public $jenis_kelamin = 'Laki-laki';
    public $tanggal_lahir = '';
    public $status_pernikahan = 'Belum Menikah';
    public $tempat_lahir = '';

    // Baptisan (optional)
    public $isi_baptisan = false;
    public $tanggal_baptis = '';
    public $tempat_baptis = '';
    public $pendeta_pembaptis = '';

    // Keluarga
    public $opsi_keluarga = 'baru'; // 'baru' or 'bergabung'
    public $nama_keluarga = '';
    public $alamat_keluarga = '';
    public $kode_keluarga = '';

    protected function rules(): array
    {
        $rules = [
            'email' => 'required|email|max:255|unique:users,email|unique:jemaats,email',
            'password' => 'required|min:8|confirmed',
            'nama_lengkap' => 'required|string|max:255',
            'no_hp' => 'nullable|string|max:20',
            'nik' => 'nullable|string|max:16|unique:jemaats,nik',
            'alamat' => 'nullable|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'tanggal_lahir' => 'nullable|date',
            'status_pernikahan' => 'required|in:Belum Menikah,Menikah,Duda,Janda',
            'tempat_lahir' => 'nullable|string|max:255',
            'opsi_keluarga' => 'required|in:baru,bergabung',
        ];

        if ($this->isi_baptisan) {
            $rules['tanggal_baptis'] = 'required|date';
            $rules['tempat_baptis'] = 'nullable|string|max:255';
            $rules['pendeta_pembaptis'] = 'nullable|string|max:255';
        }

        if ($this->opsi_keluarga === 'baru') {
            $rules['nama_keluarga'] = 'required|string|max:255';
            $rules['alamat_keluarga'] = 'nullable|string';
        } else {
            $rules['kode_keluarga'] = 'required|exists:keluargas,kode_keluarga';
        }

        return $rules;
    }

    protected $messages = [
        'email.unique' => 'Email ini sudah terdaftar.',
        'nik.unique' => 'NIK ini sudah terdaftar.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
        'password.min' => 'Password minimal 8 karakter.',
        'kode_keluarga.exists' => 'Kode keluarga tidak ditemukan.',
    ];

    public function register()
    {
        $this->validate();

        // Create User account
        $user = User::create([
            'name' => $this->nama_lengkap,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        $jemaatRole = Role::where('name', 'Jemaat')->first();
        if ($jemaatRole) {
            $user->assignRole($jemaatRole);
        }

        // Handle keluarga
        $keluargaId = null;
        $statusWakil = false;

        if ($this->opsi_keluarga === 'baru') {
            $keluarga = Keluarga::create([
                'nama_keluarga' => $this->nama_keluarga,
                'alamat_keluarga' => $this->alamat_keluarga,
                'kode_keluarga' => strtoupper(Str::random(8)),
            ]);
            $keluargaId = $keluarga->id;
            $statusWakil = false;
        } else {
            $keluarga = Keluarga::where('kode_keluarga', $this->kode_keluarga)->first();
            $keluargaId = $keluarga->id;
            $statusWakil = true;
        }

        // Create Jemaat record
        $jemaat = Jemaat::create([
            'user_id' => $user->id,
            'nama_lengkap' => $this->nama_lengkap,
            'nik' => $this->nik ?: null,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir ?: null,
            'jenis_kelamin' => $this->jenis_kelamin,
            'alamat' => $this->alamat,
            'no_hp' => $this->no_hp,
            'email' => $this->email,
            'status_pernikahan' => $this->status_pernikahan,
            'status_keanggotaan' => $this->isi_baptisan ? 'Anggota Baptis' : 'Calon Anggota',
            'is_active' => true,
            'keluarga_id' => $keluargaId,
            'status_wakil_keluarga' => $statusWakil,
        ]);

        // Update keluarga kepala_keluarga_id if new
        if ($this->opsi_keluarga === 'baru') {
            $keluarga->update(['kepala_keluarga_id' => $jemaat->id]);
        }

        // Create Baptisan record if filled
        if ($this->isi_baptisan && $this->tanggal_baptis) {
            Baptisan::create([
                'jemaat_id' => $jemaat->id,
                'tanggal_baptis' => $this->tanggal_baptis,
                'tempat_baptis' => $this->tempat_baptis ?: null,
                'pendeta_pembaptis' => $this->pendeta_pembaptis ?: null,
            ]);

            // Also update the tanggal_baptis on jemaat for backward compat
            $jemaat->update(['tanggal_baptis' => $this->tanggal_baptis]);
        }

        session()->flash('success', 'Registrasi berhasil! Silakan login dengan email dan password Anda.');
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.jemaat.register')
            ->layout('layouts.guest');
    }
}
