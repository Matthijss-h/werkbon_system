<?php

use App\Http\Controllers\WorkorderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/workorders/open');
});

Route::get('/workorders/{status}', [WorkorderController::class, 'index'])
    ->where('status', 'open|closed')
    ->name('workorders.index');

Route::get('/workorder/create', [WorkorderController::class, 'create'])
    ->name('workorders.create');

Route::post('/workorder', [WorkorderController::class, 'store'])
    ->name('workorders.store');

Route::patch('/workorder/{workorder}/complete', [WorkorderController::class, 'complete'])
    ->name('workorders.complete');

Route::get('/workorder/{workorder}', [WorkorderController::class, 'show'])
    ->name('workorders.show');