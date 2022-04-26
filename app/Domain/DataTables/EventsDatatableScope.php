<?php

namespace App\Domain\DataTables;

use App\Domain\Util\Datatables\EmployeeBaseDatatableScope;
use App\Domain\Utility\DataTables\BaseDatatableScope;
use App\Models\Employee;
use App\Models\Event;
use App\Models\Site;

class EventsDatatableScope extends BaseDatatableScope
{
    /**
     * AppDatatableScope constructor.
     */
    public function __construct()
    {
        $this->setHtml([
            [
                'data' => 'name',
                'name' => 'name',
                'title' => 'Name'
            ],[
                'data' => 'place',
                'name' => 'place',
                'title' => 'Place'
            ],[
                'data' => 'fees',
                'name' => 'fees',
                'title' => 'Fees'
            ],[
                'data' => 'start_date',
                'name' => 'start_date',
                'title' => 'Start Date'
            ],[
                'data' => 'end_date',
                'name' => 'end_date',
                'title' => 'End Date'
            ],
        ]);
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function query()
    {
        $events = Event::query();

        if (request()->get('start_date')) {
            $events->where('start_date', request()->get('start_date'));
        }
        if (request()->get('end_date')) {
            $events->orWhere('end_date', request()->get('end_date'));
        }

        return datatables()->eloquent($events)
            ->make(true);
    }
}

