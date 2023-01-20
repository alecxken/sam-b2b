<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
          return (new EloquentDataTable($query))
        ->addColumn('action', function ($faculties) {
           return '<div class="btn-group" role="group" aria-label="Basic example">
           <div class="btn-group" role="group" aria-label="user">
           <button id="getEditProductData" class="btn btn-sm btn-success  label-sm  open-modalss" data-toggle="modal" data-target="#modal-user" value="'.$faculties->id.'"><i class="fa fa-pencil"></i></button>
           <button   id="getEditProductData" data-toggle="modal" data-toggle="modal" data-target="#delete_expense"  value="'.$faculties->id.'" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> </button>
           </div>';
       })->editColumn('created_at',function($item)
            {
               
               if (isset($item->updated_at)) {
                    return \Carbon\Carbon::parse($item->created_at)->format('Y-m-d');
               }
                     
              
            })->editColumn('updated_at',function($item)
            {
               
               if (isset($item->updated_at)) {
                    return \Carbon\Carbon::parse($item->updated_at)->format('Y-m-d');
               }
                     
              
            })  ->rawColumns(['action','created_at','updated_at']) ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('user-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::computed('action')
                  ->exportable(false)
                  ->printable(false)
                  ->width(60)
                  ->addClass('text-center'),
            Column::make('id'),
            Column::make('name'),
             Column::make('email'),
            Column::make('created_at'),
            Column::make('updated_at'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'User_' . date('YmdHis');
    }
}
