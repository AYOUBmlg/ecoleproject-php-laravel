<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtulisateurController;
use App\Http\Controllers\CourController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\FiliereController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/utulisateur', [UtulisateurController::class, 'index'])->name('utulisateur.index');

Route::get('/login', [UtulisateurController::class, 'showLogin'])->name('utulisateurs.showlogin');
Route::post('/login', [UtulisateurController::class, 'login'])->name('utulisateurs.login');
Route::get('/utulisateurs', [UtulisateurController::class, 'index'])->name('utulisateurs.index');
Route::get('/utulisateurs/create', [UtulisateurController::class, 'create'])->name('utulisateurs.create');
Route::post('/utulisateurs', [UtulisateurController::class, 'store'])->name('utulisateurs.store');

Route::get('/admin', function() { return view('admin'); })->name('admin.dashboard');
Route::get('/professeur', function() { return view('professeur'); })->name('professeur.dashboard');
Route::get('/etudiant', function() { return view('etudiant'); })->name('etudiant.dashboard');
Route::get('/cours-disponibles', [CourController::class, 'coursDisponibles'])->name('cours.disponibles');
Route::get('/utulisateurs/{id}/edit', [UtulisateurController::class, 'editUtulisateur'])->name('utulisateurs.edit');

Route::put('/utulisateurs/{id}', [UtulisateurController::class, 'updateUtulisateur'])->name('utulisateurs.update');
Route::delete('/utulisateurs/{id}', [UtulisateurController::class, 'destroy'])->name('utulisateurs.destroy');
// Routes CRUD Cours
Route::get('/cours', [CourController::class, 'index'])->name('cour.index');
Route::get('/cours/create', [CourController::class, 'create'])->name('cour.create');
Route::post('/cours', [CourController::class, 'store'])->name('cour.store');
Route::get('/cours/{id}/edit', [CourController::class, 'editCour'])->name('cour.edit');
Route::put('/cours/{id}', [CourController::class, 'updateCour'])->name('cour.update');
Route::delete('/cours/{id}', [CourController::class, 'destroy'])->name('cour.destroy');
Route::get('/cours-disponibles', [CourController::class, 'coursDisponibles'])->name('cours.disponibles');

// Routes CRUD Modules

Route::get('/modules', [ModuleController::class, 'index'])->name('module.index');
Route::get('/modules/create', [ModuleController::class, 'create'])->name('module.create');
Route::post('/modules', [ModuleController::class, 'store'])->name('module.store');
Route::get('/modules/{id}/edit', [ModuleController::class, 'editModule'])->name('module.edit');
Route::put('/modules/{id}', [ModuleController::class, 'updateModule'])->name('module.update');
Route::delete('/modules/{id}', [ModuleController::class, 'destroy'])->name('module.destroy');

// Routes CRUD Filieres


Route::get('/filieres', [FiliereController::class, 'index'])->name('filiere.index');
Route::get('/filieres/create', [FiliereController::class, 'create'])->name('filiere.create');
Route::post('/filieres', [FiliereController::class, 'store'])->name('filiere.store');
Route::get('/filieres/{id}/edit', [FiliereController::class, 'editFiliere'])->name('filiere.edit');
Route::put('/filieres/{id}', [FiliereController::class, 'updateFiliere'])->name('filiere.update');
Route::delete('/filieres/{id}', [FiliereController::class, 'destroy'])->name('filiere.destroy');