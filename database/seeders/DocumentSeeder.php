<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documents = [
            [
                'title' => 'Formulir Pendaftaran PPDB',
                'file_name' => 'formulir_pendaftaran_ppdb.pdf',
                'description' => 'Formulir resmi untuk pendaftaran PPDB yang harus diisi oleh calon siswa.',
                'file_size' => '250 KB',
                'type' => 'form',
                'icon' => 'mdi-file-document-outline',
                'file_path' => 'documents/formulir_pendaftaran_ppdb.pdf'
            ],
            [
                'title' => 'Surat Pernyataan Orang Tua',
                'file_name' => 'surat_pernyataan_ortu.pdf',
                'description' => 'Surat pernyataan yang harus ditandatangani oleh orang tua/wali siswa.',
                'file_size' => '200 KB',
                'type' => 'form',
                'icon' => 'mdi-file-document-outline',
                'file_path' => 'documents/surat_pernyataan_ortu.pdf'
            ],
            [
                'title' => 'Panduan Pendaftaran PPDB Online',
                'file_name' => 'panduan_ppdb_online.pdf',
                'description' => 'Petunjuk lengkap cara mendaftar PPDB Online Disdikpora Cianjur.',
                'file_size' => '1.5 MB',
                'type' => 'guide',
                'icon' => 'mdi-book-open-variant',
                'file_path' => 'documents/panduan_ppdb_online.pdf'
            ],
            [
                'title' => 'Template Surat Keterangan Sehat',
                'file_name' => 'template_surat_sehat.docx',
                'description' => 'Template surat keterangan sehat yang dapat digunakan untuk keperluan pendaftaran.',
                'file_size' => '150 KB',
                'type' => 'template',
                'icon' => 'mdi-medical-bag',
                'file_path' => 'documents/template_surat_sehat.docx'
            ],
            [
                'title' => 'Template Surat Keterangan Berkelakuan Baik',
                'file_name' => 'template_surat_berkelakuan_baik.docx',
                'description' => 'Template surat keterangan berkelakuan baik dari sekolah asal.',
                'file_size' => '120 KB',
                'type' => 'template',
                'icon' => 'mdi-account-check-outline',
                'file_path' => 'documents/template_surat_berkelakuan_baik.docx'
            ],
            [
                'title' => 'Persyaratan PPDB Tahun 2023/2024',
                'file_name' => 'persyaratan_ppdb.pdf',
                'description' => 'Daftar lengkap persyaratan untuk pendaftaran PPDB tahun ajaran 2023/2024.',
                'file_size' => '300 KB',
                'type' => 'info',
                'icon' => 'mdi-information-outline',
                'file_path' => 'documents/persyaratan_ppdb.pdf'
            ],
            [
                'title' => 'Jadwal PPDB Tahun 2023/2024',
                'file_name' => 'jadwal_ppdb.pdf',
                'description' => 'Informasi jadwal lengkap pelaksanaan PPDB tahun ajaran 2023/2024.',
                'file_size' => '180 KB',
                'type' => 'info',
                'icon' => 'mdi-calendar-check',
                'file_path' => 'documents/jadwal_ppdb.pdf'
            ]
        ];

        foreach ($documents as $document) {
            Document::create($document);
        }
    }
}