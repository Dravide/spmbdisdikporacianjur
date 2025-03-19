<?php

namespace App\DataTables;

use App\Models\DataPendaftar;
use App\Models\Pendaftar;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PendaftarDataTable extends DataTable
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
            ->editColumn('verval', function ($query) {
                if ($query->verval == 1 && $query->konfir == 1) {
                    $btn = '<span class="badge badge-soft-success">Pengolahan Selesi</span>';
                } else {
                    $btn = '<span class="badge badge-soft-danger">Dalam Proses</span>';
                }

                return $btn;
            })
            ->addColumn('action', 'pendaftar.action')
            ->rawColumns(['verval'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(DataPendaftar $model): QueryBuilder
    {
        return $model
            ->where('id_sekolah', $this->kode)
            ->with(['users','dapodik', 'asal_sekolah', 'jalur'])
            ->newQuery();
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
                    //->dom('Bfrtip')
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
            ->data('DT_RowIndex'),
            Column::make('users.username')
            ->data('users.username')
            ->title('No. Pendaftaran'),
            Column::make('dapodik.nama')
            ->data('dapodik.nama')
            ->title('Nama'),
            Column::make('asal_sekolah.nama')
            ->data('asal_sekolah.nama')
            ->title('Asal Sekolah'),
            Column::make('verval')
            ->data('verval')
            ->title('Status'),
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
