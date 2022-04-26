<?php

Route::get('events', 'EventsController@index');

Route::get('events/export', 'EventsController@export')->name('events.export');
