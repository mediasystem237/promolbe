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


Route::post('/send-sms', [SmsController::class, 'sendSms']);

Route::get('/evenement-participation', [EvenementController::class, 'participer'])->name('evenement-participation');
