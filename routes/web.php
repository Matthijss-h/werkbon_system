<?php

use App\Http\Controllers\WorkorderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/workorders/open');
});

Route::get('/workorders/{status}', [WorkorderController::class, 'index'])
    ->where('status', 'open|closed')
    ->name('workorders.index');