<?php

namespace App\DataTables;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class NewsletterUsersDataTable extends DataTable
{

    private $newsletter_id;

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
            ->addColumn('action', 'dashboard.admin.cruds.inscrit.action')
            ->addColumn('full_name' ,function ($user){
                
                return "$user->name $user->last_name";
            })
            ->addColumn('image' ,'dashboard.admin.cruds.inscrit.image')
            ->rawColumns([ 'action' , 'image']);
        }   

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->whereHas('newsletters', function ($query) {

            $query->where('newsletter_user.inscription', User::SUBSCRIBE)
            
            ->where('newsletter_id' , $this->newsletter_id);
        });
    }

    public function setNewsletterId($newsletter_id)
    {
        $this->newsletter_id = $newsletter_id;

        return $this;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('newsletterusers-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('liprtip')
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
            Column::make('id'),
            Column::make('image'),
            Column::make('full_name'),
            Column::make('dob'),
            Column::make('email'),
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
        return 'NewsletterUsers_' . date('YmdHis');
    }
}
