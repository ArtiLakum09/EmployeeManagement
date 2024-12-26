<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('employees', [EmployeeController::class, 'index'])->name('employees.index');          // View all employees
Route::get('employees/create', [EmployeeController::class, 'create'])->name('employees.create');    // Show form to add a new employee
Route::post('employees', [EmployeeController::class, 'store'])->name('employees.store');           // Store new employee
Route::get('employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');     // Show a single employee's details
Route::get('employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit'); // Show form to edit an employee
Route::put('employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update'); // Update employee details
Route::delete('employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy'); // Delete an employee

