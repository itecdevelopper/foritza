<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// A stable, fresh URL for sharing the birthday surprise on messaging apps.
Route::view('/para-michell', 'welcome');
