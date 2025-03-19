<?php

namespace App\DataTables;

use App\Models\DataPendaftar;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\SearchPane;
use Yajra\DataTables\Services\DataTable;
use League\Geotools\Coordinate\Coordinate;
use League\Geotools\Geotools;
use App\Models\Sekolah;
use Illuminate\Support\Facades\Auth;

class VervalDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addIndexColumn()
            ->editColumn('jenis', function ($query) {

                if ($query->jenis == 'dalam') {
                    $btn = '<span class="badge badge-soft-info">Dalam</span>';
                } else {
                    $btn = '<span class="badge badge-soft-primary">Luar</span>';
                }
                return $btn;
            })
            ->editColumn('username', function ($query) {
                $output = '<h5 class="font-size-15 mb-0">' . $query->users->username . '</h5>';
                return $output;
            })
            ->editColumn('nama', function ($query) {
                if(isset($query->dapodik))
                {
                    $sekolahs = Sekolah::where('id', Auth::user()->sekolah->id)->first();
                    $nama = $query->dapodik->nama;
                    $jk = $query->dapodik->jenis_kelamin;
                    $sekul = new Coordinate([((float)$sekolahs->lintang), ((float)$sekolahs->bujur)]);
                    $rumah = new Coordinate([((float)$query->koordinat->latitude), ((float)$query->koordinat->longitude)]);
                    $geotools = new Geotools();
                    $out = round($geotools->distance()->setFrom($sekul)->setTo($rumah)->flat());
                } else {
                    $nama = 'NAMA KOSONG';
                    $jk = 'JK KOSONG';
                }
                $output = '' . $nama . ' <span class="badge badge-soft-secondary">' . $jk . '</span> <span class="badge badge-soft-primary">' . $out . ' METER</span>'  ;
                return $output;
            })
            ->editColumn('nisn', function ($query) {
                return $query->nisn;
            })
            ->editColumn('asal_sekolah', function ($query) {
                return $query->asal_sekolah->nama;
            })
            ->editColumn('jalur', function ($query) {
                 if($query->konfir == '0' AND $query->verval == '0') {
                    $st = '<i class="mdi mdi-checkbox-blank-circle text-danger me-1"></i> Belum Konfimasi';
                } elseif ($query->konfir == '1' AND $query->verval == '0') {
                    $st = '<i class="mdi mdi-checkbox-blank-circle text-success me-1"></i> Siap Diperiksa';
                } elseif ($query->konfir == '2' AND $query->verval == '2') {
                    $st = '<i class="mdi mdi-checkbox-blank-circle text-warning me-1"></i> Perbaikan';
                }elseif ($query->konfir == '1' AND $query->verval == '2') {
                    $st = '<i class="mdi mdi-checkbox-blank-circle text-warning me-1"></i> Perbaikan';
                } else {
                     $st = '<i class="mdi mdi-checkbox-blank-circle text-success me-1"></i> Siap Diperiksa';
                }
                return $st;
            })
            ->editColumn('jenis', function ($query) {

                if ($query->jenis == 'dalam') {
                    $btn = '<span class="badge badge-soft-info">Dalam</span>';
                } else {
                    $btn = '<span class="badge badge-soft-primary">Luar</span>';
                }
                return $btn;
            })
            ->addColumn('action', function ($query) {
                $btn = '<div class="btn-group" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-soft-info btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="true"><i class="mdi mdi-menu-open"></i>
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1" data-popper-placement="bottom-start">
                                                    <li><a class="dropdown-item" href="' . route('operator.verval.pendaftar', $query->nisn) . '">Verval</a></li>
                                                    <li>
                                                    <form action="/verval/reset" method="post">

                                                    </form>

                                                </ul>
                                            </div>';
                return $btn;
            })
//            ->editColumn('konfir', function ($query) {
//                if ($query->konfir == 1) {
//                    return '<i class="mdi mdi-checkbox-blank-circle text-success me-1"></i>';
//                } else if ($query->konfir == 2) {
//                    return '<i class="mdi mdi-checkbox-blank-circle text-warning me-1"></i>';
//                } else {
//                    return '<i class="mdi mdi-checkbox-blank-circle text-danger me-1"></i>';
//                }
//
//            })
            ->rawColumns(['jenis', 'action', 'username', 'nisn', 'jalur', 'nama'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(DataPendaftar $model): QueryBuilder
    {
        return $model->with(['users','dapodik', 'sekolah', 'asal_sekolah','jalur'])->where('id_jalur', $this->kode)
            ->where('id_sekolah', \Auth::user()->sekolah->id)
            ->where('verval', '!=', '1'

            )
            ->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->language([
                'processing' => '<i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>
                    <span class="sr-only">Loading...</span>',
                'search' => '<i class="fa fa-search text-info me-2"></i>',
                'paginate' => [
                    'previous' => '<i class="fa fa-angle-left"></i>',
                    'next' => '<i class="fa fa-angle-right"></i>'
                ],
                'lengthMenu' => '<select class="form-select form-select-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                    <option value="-1">All</option>
                </select> Per Halaman',
                'info' => 'Menampilkan _START_ - _END_ dari _TOTAL_ data',
                'infoFiltered' => '(difilter dari _MAX_ total data)',
                'searchPlaceholder' => 'Cari...',
                'zeroRecords' => 'Tidak ada data ditemukan',

            ])
            ->searchPanes(SearchPane::make())
            ->setTableId('verval-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->lengthMenu([[10, 25, 50, -1], [10, 25, 50, "All"]])
            ->pageLength('25')
            ->orderBy(1);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('#')
                ->data('DT_RowIndex')
                ->orderable(false)
                ->searchable(false),
            Column::make('users.username')
                ->data('username')
                ->title('USERNAME'),
            Column::make('nisn')
                ->data('nisn')
                ->title('NISN'),
            Column::make('dapodik.nama')
                ->data('nama')
                ->title('NAMA LENGKAP'),
            Column::make('asal_sekolah.nama')
                ->data('asal_sekolah')
                ->title('ASAL SEKOLAH'),
            Column::make('jalur.kode')
                ->data('jalur')
                ->title('STATUS'),
            Column::make('whatsapp')
                ->data('whatsapp')
                ->title('WHATSAPP'),
            Column::make('jenis')
                ->data('jenis')
                ->title('JENIS'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Verval_' . date('YmdHis');
    }
}
