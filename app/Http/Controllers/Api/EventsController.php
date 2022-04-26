<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventsCollection;
use App\Models\Event;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::orderByDesc('start_date')->paginate(2);

        return new EventsCollection($events);
    }
}
