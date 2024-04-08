<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AllTicketController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\AdminFormController;
use App\Http\Controllers\VragenController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/dashboard', [TicketController::class, 'list'])->middleware(['auth'])->name('dashboard');

Route::get('/klant-toevoegen', [FormController::class, 'form'])->name('form');

Route::get('/klant-toevoegen', [FormController::class, 'showTickets'])->name('form');


Route::get('/nieuwe-ticket', [FormController::class, 'form'])->name('form');

Route::post('/nieuwe-ticket', [FormController::class, 'post'])->name('formPost');


Route::get('/Admin/nieuwe-ticket', [AdminFormController::class, 'formAdmin'])->name('formAdmin');

Route::post('/Admin/nieuwe-ticket', [AdminFormController::class, 'postAdmin'])->name('postAdmin');

Route::get('/tickets', [TicketController::class, 'list'])->name('tickets.list');

Route::get('/tickets/{project}', [TicketController::class, 'showTickets'])->name('tickets.show');

Route::get('/vragen', [VragenController::class, 'vragenPage'])->name('vragen.page');

Route::get('/dashboard2', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/admin/dashboard', [AllTicketController::class, 'list'])->middleware(['auth:admin'])->name('admin.dashboard');

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin'])->name('admin.dashboard');


Route::get('/admin/dashboard', [AllTicketController::class, 'list'])
    ->middleware(['auth:admin'])
    ->name('admin.dashboard');

Route::get('/admin/dashboard/tickets/{project}', [TicketController::class, 'showTickets'])
->middleware(['auth:admin'])
->name('admin.tickets.show');

/*
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin'])->name('admin.dashboard');
*/

require __DIR__.'/auth.php';

require __DIR__.'/adminauth.php';



