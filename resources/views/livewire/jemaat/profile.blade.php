<div class="py-12">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        @if (session()->has('message'))
            <div class="mb-6 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('message') }}
            </div>
        @endif

        @if (!$jemaat)
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-6 text-center">
                <p class="text-yellow-800">Data jemaat belum tersedia. Silakan hubungi admin.</p>
            </div>
        @else
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Profil Saya</h1>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Informasi data diri Anda</p>
                </div>
                <a href="{{ route('jemaat.profile.edit') }}" wire:navigate class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit Profil
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Photo & Status -->
                <div class="md:col-span-1">
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6 text-center">
                        @if ($jemaat->foto)
                            <img src="{{ Storage::url($jemaat->foto) }}" alt="Foto Profil" class="w-32 h-32 rounded-full mx-auto object-cover mb-4 border-4 border-blue-100">
                        @else
                            <div class="w-32 h-32 rounded-full mx-auto bg-blue-100 dark:bg-blue-900 flex items-center justify-center mb-4">
                                <svg class="w-16 h-16 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                        @endif
                        <h2 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $jemaat->nama_lengkap }}</h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $jemaat->status_keanggotaan }}</p>
                        <span class="mt-2 inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $jemaat->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $jemaat->is_active ? 'Aktif' : 'Tidak Aktif' }}
                        </span>
                    </div>
                </div>

                <!-- Personal Info -->
                <div class="md:col-span-2 space-y-6">
                    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                        <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-4">Informasi Pribadi</h3>
                        <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">NIK</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jemaat->nik ?? '-' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Jenis Kelamin</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jemaat->jenis_kelamin }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tempat Lahir</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jemaat->tempat_lahir ?? '-' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tanggal Lahir</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jemaat->tanggal_lahir ? $jemaat->tanggal_lahir->format('d M Y') : '-' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Status Pernikahan</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jemaat->status_pernikahan }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">No. HP</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jemaat->no_hp ?? '-' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Email</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jemaat->email ?? '-' }}</dd>
                            </div>
                            <div>
                                <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Pekerjaan</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jemaat->pekerjaan ?? '-' }}</dd>
                            </div>
                            <div class="sm:col-span-2">
                                <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Alamat</dt>
                                <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jemaat->alamat ?? '-' }}</dd>
                            </div>
                        </dl>
                    </div>

                    <!-- Baptisan Info -->
                    @if ($jemaat->baptisans->count() > 0)
                        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                            <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-4">Data Baptisan</h3>
                            @foreach ($jemaat->baptisans as $baptisan)
                                <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4 {{ !$loop->last ? 'mb-3' : '' }}">
                                    <dl class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                        <div>
                                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tanggal Baptis</dt>
                                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $baptisan->tanggal_baptis->format('d M Y') }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tempat Baptis</dt>
                                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $baptisan->tempat_baptis ?? '-' }}</dd>
                                        </div>
                                        <div class="sm:col-span-2">
                                            <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Pendeta Pembaptis</dt>
                                            <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $baptisan->pendeta_pembaptis ?? '-' }}</dd>
                                        </div>
                                    </dl>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Keluarga Info -->
                    @if ($jemaat->keluarga)
                        <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                            <h3 class="text-base font-semibold text-gray-900 dark:text-white mb-4">Data Keluarga</h3>
                            <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Nama Keluarga</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jemaat->keluarga->nama_keluarga }}</dd>
                                </div>
                                <div>
                                    <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Peran</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                                        @if (!$jemaat->status_wakil_keluarga && $jemaat->keluarga->kepala_keluarga_id === $jemaat->id)
                                            Kepala Keluarga
                                        @else
                                            Wakil / Anggota Keluarga
                                        @endif
                                    </dd>
                                </div>
                                @if ($jemaat->keluarga->kepala_keluarga_id === $jemaat->id)
                                    <div class="sm:col-span-2">
                                        <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Kode Keluarga</dt>
                                        <dd class="mt-1 text-sm font-mono text-blue-600 dark:text-blue-400">{{ $jemaat->keluarga->kode_keluarga }}</dd>
                                        <p class="text-xs text-gray-500 mt-1">Bagikan kode ini kepada anggota keluarga untuk bergabung.</p>
                                    </div>
                                @endif
                                <div class="sm:col-span-2">
                                    <dt class="text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">Alamat Keluarga</dt>
                                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">{{ $jemaat->keluarga->alamat_keluarga ?? '-' }}</dd>
                                </div>
                            </dl>
                        </div>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
