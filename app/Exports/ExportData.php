<?php

namespace App\Exports;

use App\Models\DataPendaftar;
use App\Models\Sekolah;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use League\Geotools\Coordinate\Coordinate;
use League\Geotools\Geotools;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithProperties;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;


class ExportData implements  WithProperties, WithCustomStartCell, FromQuery, WithHeadings, WithMapping, WithColumnFormatting, ShouldAutoSize, WithEvents, WithColumnWidths
{
    public function properties(): array
    {
        return [
            'creator'        => 'DISDIKPORA Kab. Cianjur',
            'lastModifiedBy' => 'DISDIKPORA Kab. Cianjur',
            'title'          => 'Excel Zonasi',
            'description'    => 'Format Excel PPDB SMP DISDIKPORA Kab. Cianjur Tahun 2024',
            'subject'        => 'Zonasi',
            'keywords'       => 'export,spreadsheet',
            'category'       => 'Format',
            'manager'        => 'Dery Supriady',
            'company'        => 'DISDIKPORA Kab. Cianjur',
        ];
    }

    public function query()
    {
        // $dp = DataPendaftar::where('id_sekolah', \Auth::user()->sekolah->id)
        //         ->join('users', 'users.id', '=', 'data_pendaftars.id_users')
        //         ->join('kelulusans', 'kelulusans.username', '=', 'users.username')
        //         ->where('kelulusans.keterangan', 'DITERIMA')->limit(10)
        //         ->get();
                
        
        return DataPendaftar::query()
            ->where('id_sekolah', \Auth::user()->sekolah->id)
            ->join('users', 'users.id', '=', 'data_pendaftars.id_users')
            ->join('kelulusans', 'kelulusans.username', '=', 'users.username')
            ->where('kelulusans.keterangan', 'DITERIMA')->limit(10);
        
        
        // dd($dp);
        
        // return $dp;
        // return DataPendaftar::query()
        //     ->whereIdSekolah(\Auth::user()->sekolah->id)
        //     ->orderByRaw("FIELD(verval , '1', '2', '0') ASC");
    }

    public function startCell(): string
    {
        return 'A10';
    }

    public function map($data): array
    {
        $sekolahs = Sekolah::where('id', Auth::user()->sekolah->id)->first();
        $sekul = new Coordinate([((float)$sekolahs->lintang), ((float)$sekolahs->bujur)]);
        $rumah = new Coordinate([((float)$data->koordinat->latitude), ((float)$data->koordinat->longitude)]);
        $geotools = new Geotools();
        $out = round($geotools->distance()->setFrom($sekul)->setTo($rumah)->flat());
        

        static $number = 1;
        return[
            $number++,
            $data->users->username,
            $data->nisn,
            "'".$data->dapodik->nik,
            strtoupper($data->dapodik->nama),
            strtoupper($data->dapodik->tempat_lahir),
            $data->dapodik->tanggal_lahir,
            $data->dapodik->jenis_kelamin,
            $data->whatsapp,
            strtoupper($data->dapodik->alamat_jalan),
            $data->dapodik->rt,
            $data->dapodik->rw,
            strtoupper($data->dapodik->desa_kelurahan),
            strtoupper($data->dapodik->nama_dusun),
            strtoupper($data->dapodik->nama_ibu_kandung),
            strtoupper($data->dapodik->pekerjaan_ibu),
            $data->dapodik->penghasilan_ibu,
            strtoupper($data->dapodik->nama_ayah),
            strtoupper($data->dapodik->pekerjaan_ayah),
            $data->dapodik->penghasilan_ayah,
            $data->koordinat->latitude,
            $data->koordinat->longitude,
            strtoupper($data->asal_sekolah->nama),
            \Str::upper($data->jenis),
            $out,
            ($data->verval == 1 ? 'TERIMA' : 'TOLAK')

        ];
    }
    public function headings(): array
    {
        return [
            'NO',
            'NOMOR PESERTA',
            'NISN',
            'NIK',
            'NAMA LENGKAP',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'JENIS KELAMIN',
            'WHATSAPP',
            'ALAMAT',
            'RT',
            'RW',
            'DESA',
            'DUSUN',
            'NAMA IBU KANDUNG',
            'PEKERJAAN IBU',
            'PENGHASILAN IBU',
            'NAMA AYAH',
            'PEKERJAAN AYAH',
            'PENGHASILAN AYAH',
            'LINTANG',
            'BUJUR',
            'ASAL SEKOLAH',
            'JENIS (LUAR/DALAM)',
            'JARAK',
            'VERVAL',


        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_NUMBER,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_GENERAL,
            'E' => NumberFormat::FORMAT_TEXT
        ];
    }
    public function registerEvents(): array
    {

        return [
            
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;
                $event->sheet->getStyle('0')->getFont()->setName('Arial');

                $sheet->mergeCells('A1:I1');
                $sheet->setCellValue('A1', "PENERIMAAN PESERTA DIDIK BARU");
                $event->sheet->getDelegate()->getStyle('A1:Z1')
                    ->getFont()
                    ->getColor()
                    ->setARGB('F5F7F8');
                $sheet->getDelegate()->getStyle('A1:Z1')->getFont()->setSize('20')->setBold(true);
                $sheet->getDelegate()->getStyle('A1:Z1')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('379777');

                $sheet->mergeCells('A2:Z2');
                $sheet->setCellValue('A2', "DINAS PENDIDIKAN PEMUDA DAN OLAHRAGA KABUPATEN CIANJUR");
                $event->sheet->getDelegate()->getStyle('A2:I2')
                    ->getFont()
                    ->getColor()
                    ->setARGB('F5F7F8');
                $sheet->getDelegate()->getStyle('A2:Z2')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('379777');
                $sheet->mergeCells('A3:Z3');
                $sheet->setCellValue('A3', Auth::user()->sekolah->nama_sekolah);
                $event->sheet->getDelegate()->getStyle('A3:Z3')
                    ->getFont()
                    ->getColor()
                    ->setARGB('F5F7F8');
                $sheet->getDelegate()->getStyle('A3:Z3')->getFont()->setSize('16')->setBold(true);
                $sheet->getDelegate()->getStyle('A3:Z3')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('379777');
                $sheet->mergeCells('A5:Z5');
                $sheet->setCellValue('A5', "Data Peserta Didik yang Telah diterima di ". Auth::user()->sekolah->nama_sekolah);

                $sheet->mergeCells('A6:B6');
                $sheet->setCellValue('A6', "Tanggal Pengunduhan");
                $sheet->setCellValue('C6', ": ".Carbon::parse(now())->translatedFormat('d F Y H:i')." WIB");
                
                $sheet->mergeCells('A8:B8');
                $sheet->setCellValue('A8', "PERHATIAN");
                $sheet->setCellValue('C8', ": NO. WHATSAPP KEMUNGKINAN NOMOR TELEPON OPERATOR SD ATAU GURU SD YANG BERTUGAS MEMBANTU PROSES PENDAFTARAN");
                
            

                $cellRange = 'A10:Z10';
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(12)->setBold(true);
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
                $event->sheet->getDelegate()->getStyle($cellRange)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle($cellRange)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('379777');
                $event->sheet->getDelegate()->getStyle($cellRange)
                    ->getFont()
                    ->getColor()
                    ->setARGB('F5F7F8');

                $event->sheet->getDelegate()->getRowDimension('10')->setRowHeight(40);

                $event->sheet->getDelegate()->getStyle('A11:A' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('B11:B' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('C11:C' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('D11:D' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                // $event->sheet->getDelegate()->getStyle('E11:E' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('F11:F' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('G11:G' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('H11:H' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('I11:I' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('K11:K' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('L11:L' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('W11:W' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('X11:X' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('Y11:Y' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('Z11:Z' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

                $lastColumn = $event->sheet->getHighestColumn();
                $lastRow = $event->sheet->getHighestRow();

                $range = 'A10:' . $lastColumn . $lastRow;
                $event->sheet->getStyle($range)->applyFromArray([
                    'borders' => [
                        'allBorders' => [
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '#45474B'],
                        ],
                    ],
                ]);
                },
        ];
    }
    public function columnWidths(): array
    {
        return [
            'A' => 8,
            'B' => 23,
            'C' => 23,
            'D' => 23,
            'E' => 55,
            'F' => 25,
            'G' => 20,
            'H' => 18,
            'I' => 18,
            'J' => 50,
            'K' => 5,
            'L' => 5,
            'M' => 25,
            'N' => 25,
            'O' => 40,
            'P' => 25,
            'Q' => 35,
            'R' => 40,
            'S' => 25,
            'T' => 35,
            'U' => 17,
            'V' => 17,
            'W' => 35,
            'X' => 20,
            'Y' => 10,
            'Z' => 10,
        ];
    }


}
