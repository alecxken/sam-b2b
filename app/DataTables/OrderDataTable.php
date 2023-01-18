<?php

namespace App\DataTables;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
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
        
           <a class="btn btn-success btn-sm" href="/view-cart/'.$faculties->_token.'">
<i class="fa fa-eye"></i> </a>
           <button   id="getEditProductDatas" data-toggle="modal" data-toggle="modal" data-target="#delete_expense"  value="'.$faculties->id.'" class="btn btn-sm btn-danger text-white"><i class="fa fa-trash"></i> </button>
           </div>';
       })

               ->editColumn('payment_status', function ($faculties) {

                if($faculties->payment_status == 'Paid')
                {
                     return '<div class="action-label">
                                <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                <i class="fa fa-dot-circle-o text-success"></i> '.$faculties->payment_status.'
                                </a>
                             </div>';
                }
                else
                {
                       return '<div class="action-label">
                                <a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
                                <i class="fa fa-dot-circle-o text-danger"></i> '.$faculties->payment_status.'
                                </a>
                                </div>';
                }
        
       })->editColumn('delivery_status', function ($faculties) {
           return '<div class="action-label">
<a class="btn btn-white btn-sm btn-rounded" href="javascript:void(0);">
<i class="fa fa-dot-circle-o text-danger"></i> '.$faculties->delivery_status.'
</a>
</div>';
       })->RawColumns(['payment_status','delivery_status','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model): QueryBuilder
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
                    ->setTableId('order-table')
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
         //   Column::make('token'),
            Column::make('order_by'),
            // Column::make('cart_ref'),
            Column::make('qty'),
            Column::make('total'),
            Column::make('payment_ref'),
            Column::make('payment_status'),
            Column::make('delivery_status'),
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
        return 'Order_' . date('YmdHis');
    }
}
