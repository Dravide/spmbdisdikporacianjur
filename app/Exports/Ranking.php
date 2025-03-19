<?php

namespace App\Exports;

use App\Models\DataNilai;
use App\Models\DataPendaftar;
use App\Models\Sekolah;
use App\Models\Verval;
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


class Ranking implements  WithProperties, WithCustomStartCell, FromQuery, WithHeadings, WithMapping, WithColumnFormatting, ShouldAutoSize, WithEvents, WithColumnWidths
{
    public function properties(): array
    {
        return [
            'creator'        => 'DISDIKPORA Kab. Cianjur',
            'lastModifiedBy' => 'DISDIKPORA Kab. Cianjur',
            'title'          => 'Excel Ranking',
            'description'    => 'Format Excel PPDB SMP DISDIKPORA Kab. Cianjur Tahun 2024',
            'subject'        => 'Ranking',
            'keywords'       => 'export,spreadsheet',
            'category'       => 'Format',
            'manager'        => 'Dery Supriady',
            'company'        => 'DISDIKPORA Kab. Cianjur',
        ];
    }

    public function query()
    {
        return DataPendaftar::query()
            ->whereIdSekolah(\Auth::user()->sekolah->id)
            ->whereIdJalur('2')
            ->orderByRaw("FIELD(verval , '1', '2', '0') ASC");
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
        $dataprestasi = [];
        $hasil = Verval::whereIdPendaftar($data->users->username)
            ->whereIdBerkas(5)->first();

        if (isset($hasil->DataNilai)) {
            foreach ($hasil->DataNilai as $prestasi) {
                // Pastikan $prestasi, $prestasi->key, dan $prestasi->value tidak null
                if ($prestasi && $prestasi->key && isset($prestasi->value)) {
                    // Dapatkan teks tingkat berdasarkan pemetaan
                    $dataprestasi[] = $prestasi->value;
                } else {
                    // Menangani kasus ketika $prestasi atau salah satu propertinya null
                    $dataprestasi[] = "Data Prestasi Tidak Lengkap";
                }
            }
        } else {
            // Menangani kasus ketika $hasil atau $hasil->DataNilai null
            $dataprestasi[] = "Tidak Ada Data Prestasi";
        }



        $nilai = Verval::whereIdPendaftar($data->users->username)
            ->whereIdBerkas(6)->first();

        $items = []; // Inisialisasi default untuk $items

        if (isset($nilai->DataNilai)) {
            $items = json_decode($nilai->DataNilai->toJson(), true);
        }

// Inisialisasi array untuk menyimpan hasil per variable
        $results = [
            '51' => 0,
            '52' => 0,
            '61' => 0,
        ];

// Iterasi setiap item dan jumlahkan ke variabel yang sesuai
        foreach ($items as $item) {
            $key = substr($item['key'], 0, 2); // Ambil dua karakter pertama dari key
            if (array_key_exists($key, $results)) {
                $results[$key] += (int)$item['value']; // Tambahkan nilai ke variabel yang sesuai
            }
        }
        static $number = 1;
        return array_merge(
            [
                $number++,
                $data->users->username,
                $data->nisn,
                $data->dapodik->nama,
                $data->dapodik->jenis_kelamin,
                $data->asal_sekolah->nama,
                \Str::upper($data->jenis),
                $out,
                ($data->verval == 1 ? 'TERIMA' : 'TOLAK')
            ],
            $results,
            $dataprestasi,

        );

    }
    public function headings(): array
    {
        return [
            'NO',
            'NOMOR PESERTA',
            'NISN',
            'NAMA',
            'JENIS KELAMIN',
            'ASAL SD',
            'JENIS',
            'JARAK',
            'VERVAL',
            'RAPORT 5 SM 1',
            'RAPORT 5 SM 2',
            'RAPORT 6 SM 1',
            'RANK 5 SM 1',
            'RANK 5 SM 2',
            'RANK 6 SM 1'
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_TEXT,
            'B' => NumberFormat::FORMAT_NUMBER,
            'C' => NumberFormat::FORMAT_TEXT,
            'D' => NumberFormat::FORMAT_TEXT,
            'E' => NumberFormat::FORMAT_NUMBER
        ];
    }
    public function registerEvents(): array
    {

        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet;
                $event->sheet->getStyle('0')->getFont()->setName('Arial');

                $sheet->mergeCells('A1:O1');
                $sheet->setCellValue('A1', "PENERIMAAN PESERTA DIDIK BARU");
                $event->sheet->getDelegate()->getStyle('A1:O1')
                    ->getFont()
                    ->getColor()
                    ->setARGB('F5F7F8');
                $sheet->getDelegate()->getStyle('A1:O1')->getFont()->setSize('20')->setBold(true);
                $sheet->getDelegate()->getStyle('A1:O1')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('379777');

                $sheet->mergeCells('A2:O2');
                $sheet->setCellValue('A2', "DINAS PENDIDIKAN PEMUDA DAN OLAHRAGA KABUPATEN CIANJUR");
                $event->sheet->getDelegate()->getStyle('A2:O2')
                    ->getFont()
                    ->getColor()
                    ->setARGB('F5F7F8');
                $sheet->getDelegate()->getStyle('A2:O2')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('379777');
                $sheet->mergeCells('A3:O3');
                $sheet->setCellValue('A3', Auth::user()->sekolah->nama_sekolah);
                $event->sheet->getDelegate()->getStyle('A3:O3')
                    ->getFont()
                    ->getColor()
                    ->setARGB('F5F7F8');
                $sheet->getDelegate()->getStyle('A3:O3')->getFont()->setSize('16')->setBold(true);
                $sheet->getDelegate()->getStyle('A3:O3')->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()
                    ->setARGB('379777');
                $sheet->mergeCells('A5:B5');
                $sheet->setCellValue('A5', "Jalur Pendafataran");
                $sheet->setCellValue('C5', ": Ranking");

                $sheet->mergeCells('A6:B6');
                $sheet->setCellValue('A6', "Tanggal Pengunduhan");
                $sheet->setCellValue('C6', ": ".Carbon::parse(now())->translatedFormat('d F Y H:i')." WIB");

                $sheet->mergeCells('A8:B8');
                $sheet->setCellValue('A8', "Jumlah Pendaftar");
                $sheet->setCellValue('C8', ": ".DataPendaftar::whereIdSekolah(\Auth::user()->sekolah->id)->whereIdJalur('2')->count());


                $cellRange = 'A10:O10';
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
                $event->sheet->getDelegate()->getStyle('E11:E' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('F11:F' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('G11:G' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('H11:H' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('I11:I' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('J11:J' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('K11:K' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('L11:L' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('M11:M' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('N11:N' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
                $event->sheet->getDelegate()->getStyle('O11:O' . $event->sheet->getHighestRow())->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
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
            'B' => 26,
            'C' => 23,
            'D' => 50,
            'E' => 25,
            'F' => 32,
            'G' => 10,
            'H' => 13,
            'I' => 12
        ];
    }


}
