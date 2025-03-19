<?php

namespace App\DataTables;

use App\Models\DataPendaftar;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\SearchPane;
use Yajra\DataTables\Services\DataTable;

class DataPendaftarDataTable extends DataTable
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
                    $nama = $query->dapodik->nama;
                    $jk = $query->dapodik->jenis_kelamin;
                } else {
                    $nama = 'NAMA KOSONG';
                    $jk = 'JK KOSONG';
                }
                $output = '' . $nama . ' <span class="badge badge-soft-secondary">' . $jk . '</span>';
                return $output;
            })
            ->editColumn('nisn', function ($query) {
                return $query->nisn;
            })
            ->editColumn('asal_sekolah', function ($query) {
                return $query->asal_sekolah->nama;
            })
            ->editColumn('jalur', function ($query) {
                $btn = '<p class="mb-1 font-size-12">' . $query->jalur->nama_jalur . '</p>';
                return $btn;
            })
            ->editColumn('jenis', function ($query) {
                if ($query->jenis == 'dalam') {
                    $btn = '<span class="badge badge-soft-info">Dalam</span>';
                } else {
                    $btn = '<span class="badge badge-soft-primary">Luar</span>';
                }
                return $btn;
            })
            ->rawColumns(['jenis', 'action', 'username', 'nisn', 'jalur', 'nama']);

    }

    /**
     * Get the query source of dataTable.
     */
    public function query(DataPendaftar $model): QueryBuilder
    {
        $query = $model
            ->with(['users', 'dapodik', 'asal_sekolah', 'jalur'])
            ->where('id_sekolah', $this->id)
            ->newQuery();
        return $query;
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
            ->setTableId('datapendaftar-table')
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
                ->title('JALUR'),
            Column::make('jenis')
                ->data('jenis')
                ->title('JENIS'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'DataPendaftar_' . date('YmdHis');
    }
}
