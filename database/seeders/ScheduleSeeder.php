<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = [
            [
                'title' => 'Pendaftaran Akun PPDB Online',
                'start_date' => '2023-06-01',
                'end_date' => '2023-06-15',
                'description' => 'Pendaftaran akun untuk calon peserta didik baru melalui website PPDB Online.',
                'icon' => 'mdi-account-plus'
            ],
            [
                'title' => 'Verifikasi Berkas Pendaftaran',
                'start_date' => '2023-06-16',
                'end_date' => '2023-06-25',
                'description' => 'Verifikasi berkas pendaftaran oleh panitia PPDB di sekolah tujuan.',
                'icon' => 'mdi-file-document-outline'
            ],
            [
                'title' => 'Seleksi Administrasi',
                'start_date' => '2023-06-26',
                'end_date' => '2023-07-05',
                'description' => 'Proses seleksi administrasi berdasarkan berkas yang telah diverifikasi.',
                'icon' => 'mdi-filter-outline'
            ],
            [
                'title' => 'Pengumuman Hasil Seleksi',
                'start_date' => '2023-07-10',
                'end_date' => '2023-07-10',
                'description' => 'Pengumuman hasil seleksi penerimaan peserta didik baru.',
                'icon' => 'mdi-bullhorn-outline'
            ],
            [
                'title' => 'Daftar Ulang',
                'start_date' => '2023-07-11',
                'end_date' => '2023-07-15',
                'description' => 'Daftar ulang bagi calon peserta didik yang diterima.',
                'icon' => 'mdi-refresh'
            ],
            [
                'title' => 'Masa Orientasi Siswa',
                'start_date' => '2023-07-17',
                'end_date' => '2023-07-22',
                'description' => 'Masa orientasi siswa baru di sekolah masing-masing.',
                'icon' => 'mdi-school-outline'
            ],
            [
                'title' => 'Awal Tahun Pelajaran Baru',
                'start_date' => '2023-07-24',
                'end_date' => '2023-07-24',
                'description' => 'Awal tahun pelajaran baru 2023/2024.',
                'icon' => 'mdi-calendar-check'
            ]
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}
