<?php

use App\Http\Controllers\FrutaController;

Route::resource('frutas', FrutaController::class);

Route::delete('/frutas/{fruta}', [FrutaController::class, 'destroy'])->name('frutas.destroy');

Route::get('/', function () {
    return view('welcome');
});
