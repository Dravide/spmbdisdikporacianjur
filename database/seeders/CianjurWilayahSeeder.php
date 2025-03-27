<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use App\Models\Desa;
use Illuminate\Database\Seeder;

class CianjurWilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data kecamatan di Cianjur (kode 32.03)
        $kecamatans = [
            ['code' => '32.03.01', 'name' => 'Cianjur'],
            ['code' => '32.03.02', 'name' => 'Warungkondang'],
            ['code' => '32.03.03', 'name' => 'Cibeber'],
            ['code' => '32.03.04', 'name' => 'Cilaku'],
            ['code' => '32.03.05', 'name' => 'Ciranjang'],
            ['code' => '32.03.06', 'name' => 'Bojongpicung'],
            ['code' => '32.03.07', 'name' => 'Karangtengah'],
            ['code' => '32.03.08', 'name' => 'Mande'],
            ['code' => '32.03.09', 'name' => 'Sukaluyu'],
            ['code' => '32.03.10', 'name' => 'Pacet'],
            ['code' => '32.03.11', 'name' => 'Cugenang'],
            ['code' => '32.03.12', 'name' => 'Cikalongkulon'],
            ['code' => '32.03.13', 'name' => 'Sukaresmi'],
            ['code' => '32.03.14', 'name' => 'Sukanagara'],
            ['code' => '32.03.15', 'name' => 'Campaka'],
            ['code' => '32.03.16', 'name' => 'Takokak'],
            ['code' => '32.03.17', 'name' => 'Kadupandak'],
            ['code' => '32.03.18', 'name' => 'Pagelaran'],
            ['code' => '32.03.19', 'name' => 'Tanggeung'],
            ['code' => '32.03.20', 'name' => 'Cibinong'],
            ['code' => '32.03.21', 'name' => 'Sindangbarang'],
            ['code' => '32.03.22', 'name' => 'Agrabinta'],
            ['code' => '32.03.23', 'name' => 'Cidaun'],
            ['code' => '32.03.24', 'name' => 'Naringgul'],
            ['code' => '32.03.25', 'name' => 'Campakamulya'],
            ['code' => '32.03.26', 'name' => 'Cikadu'],
            ['code' => '32.03.27', 'name' => 'Gekbrong'],
            ['code' => '32.03.28', 'name' => 'Cipanas'],
            ['code' => '32.03.29', 'name' => 'Cijati'],
            ['code' => '32.03.30', 'name' => 'Leles'],
            ['code' => '32.03.31', 'name' => 'Haurwangi'],
            ['code' => '32.03.32', 'name' => 'Pasirkuda'],
        ];

        // Insert kecamatan data
        foreach ($kecamatans as $kecamatan) {
            Kecamatan::create($kecamatan);
        }

        // Sample data desa untuk beberapa kecamatan
        // Kecamatan Cianjur (32.03.01)
        $desas = [
            // Cianjur (32.03.01)
            ['code' => '32.03.01.1001', 'name' => 'Bojongherang', 'kecamatan_code' => '32.03.01'],
            ['code' => '32.03.01.1002', 'name' => 'Muka', 'kecamatan_code' => '32.03.01'],
            ['code' => '32.03.01.1003', 'name' => 'Pamoyanan', 'kecamatan_code' => '32.03.01'],
            ['code' => '32.03.01.1004', 'name' => 'Sayang', 'kecamatan_code' => '32.03.01'],
            ['code' => '32.03.01.1005', 'name' => 'Solokpandan', 'kecamatan_code' => '32.03.01'],
            ['code' => '32.03.01.1006', 'name' => 'Sawahgede', 'kecamatan_code' => '32.03.01'],
            
            // Warungkondang (32.03.02)
            ['code' => '32.03.02.2001', 'name' => 'Bunisari', 'kecamatan_code' => '32.03.02'],
            ['code' => '32.03.02.2002', 'name' => 'Ciwalen', 'kecamatan_code' => '32.03.02'],
            ['code' => '32.03.02.2003', 'name' => 'Cibadak', 'kecamatan_code' => '32.03.02'],
            
            // Cibeber (32.03.03)
            ['code' => '32.03.03.3001', 'name' => 'Cibeber', 'kecamatan_code' => '32.03.03'],
            ['code' => '32.03.03.3002', 'name' => 'Cihaur', 'kecamatan_code' => '32.03.03'],
            ['code' => '32.03.03.3003', 'name' => 'Cibokor', 'kecamatan_code' => '32.03.03'],
            
            // Cilaku (32.03.04)
            ['code' => '32.03.04.4001', 'name' => 'Cilaku', 'kecamatan_code' => '32.03.04'],
            ['code' => '32.03.04.4002', 'name' => 'Sukasari', 'kecamatan_code' => '32.03.04'],
            ['code' => '32.03.04.4003', 'name' => 'Sirnagalih', 'kecamatan_code' => '32.03.04'],
            
            // Ciranjang (32.03.05)
            ['code' => '32.03.05.5001', 'name' => 'Ciranjang', 'kecamatan_code' => '32.03.05'],
            ['code' => '32.03.05.5002', 'name' => 'Karangtengah', 'kecamatan_code' => '32.03.05'],
            ['code' => '32.03.05.5003', 'name' => 'Mekarsari', 'kecamatan_code' => '32.03.05'],
        ];

        // Insert desa data
        foreach ($desas as $desa) {
            Desa::create($desa);
        }
    }
}