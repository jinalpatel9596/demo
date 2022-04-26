<?php

namespace App\Http\Controllers;

use App\Domain\DataTables\EventsDatatableScope;
use App\Exports\EventsExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class EventsController extends Controller
{
    public function index(EventsDatatableScope $datatable)
    {
        if (request()->ajax()) {
            return $datatable->query();
        }

        return view('events.index', [
            'html' => $datatable->html()
        ]);
    }

    public function export()
    {
        return Excel::download(new EventsExport, 'events.csv', 'Csv');
    }
}
