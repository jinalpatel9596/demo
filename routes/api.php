<?php

use App\Http\Controllers\Api\EventsController;

Route::get('events/all', [EventsController::class, 'index']);
