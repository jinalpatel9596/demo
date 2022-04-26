<?php

namespace App\Exports;

use App\Models\Event;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EventsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $events = Event::query()->select('id','name','place', 'fees', 'start_date', 'end_date');

        if (request()->get('start_date')) {
            $events->where('start_date', request()->get('start_date'));
        }
        if (request()->get('end_date')) {
            $events->orWhere('end_date', request()->get('end_date'));
        }

        return $events->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Place',
            'Fees',
            'Start Date',
            'End Date'
        ];
    }
}
