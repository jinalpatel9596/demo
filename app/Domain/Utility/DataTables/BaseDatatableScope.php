<?php

namespace App\Domain\Utility\DataTables;

use Yajra\Datatables\Html\Builder;

abstract class BaseDatatableScope
{
    /**
     * @var
     */
    protected $partialHtml;

    /**
     * @return mixed
     */
    abstract public function query();

    /**
     * @param null $url
     *
     * @return array
     */
    public function html($url = null)
    {
        $columns = array_merge([
            [
                'data' => 'id',
                'name' => 'id',
                'title' => 'ID',
            ]
        ],
        $this->partialHtml);

        /**
         * @var Builder
         */
        $builder = app('datatables.html');

        return $builder->columns($columns)
            ->ajax($url ?: request()->fullUrl())
            ->parameters([
                'responsive' => true
            ]);
    }

    /**
     * @param array $html
     *
     * @return $this
     */
    public function setHtml(array $html)
    {
        $this->partialHtml = $html;

        return $this;
    }
}
