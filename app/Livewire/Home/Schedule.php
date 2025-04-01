<?php

namespace App\Livewire\Home;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Schedule extends Component
{
    #[Layout('components.home.guest')]
    
    public $schedules = [];
    
    public function mount()
    {
        // Manual schedule data
        $this->schedules = [
            [
                'id' => 1,
                'title' => 'Pendaftaran Akun PPDB Online',
                'start_date' => '2023-06-01',
                'end_date' => '2023-06-15',
                'description' => 'Pendaftaran akun untuk calon peserta didik baru melalui website PPDB Online.',
                'status' => 'completed',
                'icon' => 'mdi-account-plus'
            ],
            [
                'id' => 2,
                'title' => 'Verifikasi Berkas Pendaftaran',
                'start_date' => '2023-06-16',
                'end_date' => '2023-06-25',
                'description' => 'Verifikasi berkas pendaftaran oleh panitia PPDB di sekolah tujuan.',
                'status' => 'active',
                'icon' => 'mdi-file-document-outline'
            ],
            [
                'id' => 3,
                'title' => 'Seleksi Administrasi',
                'start_date' => '2023-06-26',
                'end_date' => '2023-07-05',
                'description' => 'Proses seleksi administrasi berdasarkan berkas yang telah diverifikasi.',
                'status' => 'upcoming',
                'icon' => 'mdi-filter-outline'
            ],
            [
                'id' => 4,
                'title' => 'Pengumuman Hasil Seleksi',
                'start_date' => '2023-07-10',
                'end_date' => '2023-07-10',
                'description' => 'Pengumuman hasil seleksi penerimaan peserta didik baru.',
                'status' => 'upcoming',
                'icon' => 'mdi-bullhorn-outline'
            ],
            [
                'id' => 5,
                'title' => 'Daftar Ulang',
                'start_date' => '2023-07-11',
                'end_date' => '2023-07-15',
                'description' => 'Daftar ulang bagi calon peserta didik yang diterima.',
                'status' => 'upcoming',
                'icon' => 'mdi-refresh'
            ],
            [
                'id' => 6,
                'title' => 'Masa Orientasi Siswa',
                'start_date' => '2023-07-17',
                'end_date' => '2023-07-22',
                'description' => 'Masa orientasi siswa baru di sekolah masing-masing.',
                'status' => 'upcoming',
                'icon' => 'mdi-school-outline'
            ],
            [
                'id' => 7,
                'title' => 'Awal Tahun Pelajaran Baru',
                'start_date' => '2023-07-24',
                'end_date' => '2023-07-24',
                'description' => 'Awal tahun pelajaran baru 2023/2024.',
                'status' => 'upcoming',
                'icon' => 'mdi-calendar-check'
            ]
        ];
    }
    
    public function render()
    {
        return view('livewire.home.schedule');
    }
}