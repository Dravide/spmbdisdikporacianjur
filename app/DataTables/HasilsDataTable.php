<?php

namespace App\DataTables;

use App\Models\Kelulusan;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class HasilsDataTable extends DataTable
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
            ->addColumn('username', function ($row) {
                return $row->users->username ?? 'N/A';
            })
            ->addColumn('nama', function ($row) {
                return $row->users->dataPendaftar->dapodik->nama ?? 'N/A';
            })
            ->addColumn('jalur', function ($row) {
                return $row->users->dataPendaftar->jalur->nama_jalur ?? 'N/A';
            })
            ->addColumn('asal_sekolah', function ($row) {
                return $row->users->dataPendaftar->asal_sekolah->nama ?? 'N/A';
            })
            ->filterColumn('username', function($query, $keyword) {
                $query->whereHas('users', function($query) use ($keyword) {
                    $query->where('username', 'like', "%{$keyword}%");
                });
            })
            ->filterColumn('nama', function($query, $keyword) {
                $query->whereHas('users.dataPendaftar.dapodik', function($query) use ($keyword) {
                    $query->where('nama', 'like', "%{$keyword}%");
                });
            })
            ->filterColumn('jalur', function($query, $keyword) {
                $query->whereHas('users.dataPendaftar.jalur', function($query) use ($keyword) {
                    $query->where('nama_jalur', 'like', "%{$keyword}%");
                });
            })
            ->filterColumn('asal_sekolah', function($query, $keyword) {
                $query->whereHas('users.dataPendaftar.asal_sekolah', function($query) use ($keyword) {
                    $query->where('nama', 'like', "%{$keyword}%");
                });
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Kelulusan $model): QueryBuilder
    {
        return $model->newQuery()
            ->where('sekolah_id', $this->kode)
            ->with(['users.dataPendaftar.dapodik','users.dataPendaftar.jalur','users.dataPendaftar.asal_sekolah']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pendaftar-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle();
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')
                ->data('DT_RowIndex')
                ->title('No'),
            Column::make('username')
                ->title('No. Pendaftaran')
                ->orderable(true)
                ->searchable(true),
            Column::make('nama')
                ->title('Nama')
                ->orderable(true)
                ->searchable(true),
            Column::make('asal_sekolah')
                ->title('Asal Sekolah')
                ->orderable(true)
                ->searchable(true),
            Column::make('jalur')
                ->title('Jalur')
                ->orderable(true)
                ->searchable(true),
            Column::make('keterangan'),
            Column::make('daftarulang')
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Pendaftar_' . date('YmdHis');
    }
}


