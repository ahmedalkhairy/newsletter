<?php

namespace App\DataTables;

use App\Newsletter;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NewsletterDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'dashboard.admin.cruds.newsletter.action')
            ->addColumn('NumberOfMails', function ($newsletter) {

                return $newsletter->mails()->count();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Newsletter $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Newsletter $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('newsletter-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('lBfrtip')
            ->orderBy(1);

    }
    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [

            Column::make('id')->title('ID'),
            Column::make('name'),
            Column::make('active'),
            Column::make('NumberOfMails')->title("Mails"),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center')

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Newsletter_' . date('YmdHis');
    }
}
