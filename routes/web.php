<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\SmsController;

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



Route::post('/send-sms', [SmsController::class, 'sendSms']);

Route::get('/evenement-participation', [EvenementController::class, 'participer'])->name('evenement-participation');
