<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\DashboardController;
use App\Exports\InscriptionsExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/dashboard/export', function () {
    return Excel::download(new InscriptionsExport, 'inscriptions.xlsx');
})->name('dashboard.export');

Route::get('/', function () {
    return view('welcome');
});

// Formulaire d'inscription
Route::get('/inscription', [InscriptionController::class, 'create'])->name('match-inscription.create');

// Traitement de l'inscription
Route::post('/inscription', [InscriptionController::class, 'store'])->name('match-inscription.store');

Route::get('/inscription/edit', [InscriptionController::class, 'find'])->name('inscription.find');
Route::post('/inscription/edit', [InscriptionController::class, 'edit'])->name('inscription.edit');
Route::put('/inscription/{id}', [InscriptionController::class, 'update'])->name('inscription.update');

Route::delete('/inscriptions/{inscription}', [InscriptionController::class, 'destroy'])->name('inscription.destroy');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/dashboard/access', [DashboardController::class, 'showAccessForm'])->name('dashboard.access');
Route::post('/dashboard/access', [DashboardController::class, 'checkAccessCode'])->name('dashboard.access.post');



Route::post('/send-sms', [SmsController::class, 'sendSms']);

Route::get('/evenement-participation', [EvenementController::class, 'participer'])->name('evenement-participation');
