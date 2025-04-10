<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Import wilayah.sql directly using DB::unprepared
        $sql = File::get(public_path('wilayah.sql'));
        
        // Create temporary table
        DB::unprepared('DROP TABLE IF EXISTS wilayah');
        DB::unprepared('
            CREATE TABLE IF NOT EXISTS wilayah (
                kode varchar(13) NOT NULL,
                nama varchar(100) DEFAULT NULL,
                PRIMARY KEY (kode)
            )
        ');
        
        // Execute the SQL file to populate the wilayah table
        DB::unprepared($sql);
        
        // Import Kecamatan data (level 3 in the hierarchy)
        $this->command->info('Importing Kecamatan data...');
        $kecamatans = DB::table('wilayah')
            ->where('kode', 'like', '%.%.%')
            ->where('kode', 'not like', '%.%.%.%')
            ->get();
        
        foreach ($kecamatans as $kecamatan) {
            DB::table('kecamatans')->insert([
                'code' => $kecamatan->kode,
                'name' => $kecamatan->nama,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        // Import Desa data (level 4 in the hierarchy)
        $this->command->info('Importing Desa data...');
        $desas = DB::table('wilayah')
            ->where('kode', 'like', '%.%.%.%')
            ->get();
        
        foreach ($desas as $desa) {
            // Extract kecamatan code from desa code
            $kecamatanCode = substr($desa->kode, 0, strrpos($desa->kode, '.'));
            
            DB::table('desas')->insert([
                'code' => $desa->kode,
                'name' => $desa->nama,
                'kecamatan_code' => $kecamatanCode,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        
        // Drop the temporary table
        DB::unprepared('DROP TABLE IF EXISTS wilayah');
        
        $this->command->info('Wilayah data imported successfully!');
    }
}
