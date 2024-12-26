<?php
namespace incipient\structura\Routes;
use OrganizationalChart\Controllers\EmployeeController;

Route::group(['prefix' => 'organizational-chart', 'as' => 'organizationalchart.'], function () {
    // Route to display the list of employees (Organizational Chart view)
    Route::get('/', [EmployeeController::class, 'index'])->name('index');

    // Route to add a new employee
    Route::post('/store', [EmployeeController::class, 'store'])->name('store');

    // Route to delete an employee
    Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('destroy');
});
