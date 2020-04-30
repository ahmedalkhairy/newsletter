<?php

namespace App\DataTables;

use App\Mail;
use App\Newsletter;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NewsletterMailsDataTable extends DataTable
{

    private $newsletterId;

    public function __construct($newsletterId)
    {
        $this->newsletterId =$newsletterId;
    }

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
            ->addColumn('action', 'newslettermails.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\NewsletterMail $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Mail $model)
    {
        return $model->newQuery()->where('newsletter_id' , $this->newsletterId);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('newslettermails-table')
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

        // title
        // content
        return [
        
            Column::make('id'),
            Column::make('title'),
            // Column::make('content'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(60)
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
        return 'NewsletterMails_' . date('YmdHis');
    }
}
