<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SectorController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\CaseDetailsController;

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
})->name('home.welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth', 'user'])->group(function () {

Route::post('/caseDetails/{condition}/store', [CaseDetailsController::class, 'store'])->name('caseDetails.store');
Route::get('/caseDetails/create', [CaseDetailsController::class, 'create'])->name('caseDetails.create');

// Route::get('/condition', [ConditionController::class, 'index'])->name('condition.index');
Route::get('/condition/{condition}/show', [ConditionController::class, 'show'])->name('condition.show');
Route::patch('/condition/{condition}/update', [ConditionController::class, 'update'])->name('condition.update');

});

if(Route::middleware(['auth', 'employee']) || Route::middleware(['auth', 'user']) ){

Route::middleware(['auth'])->group(function () {
    Route::get('/condition', [ConditionController::class, 'index'])->name('condition.index');
});
}

//user
Route::middleware(['auth', 'employee'])->group(function () {
    Route::get('/counter', [CounterController::class, 'index'])->name('counter.index');
    Route::get('/counter/search', [CounterController::class, 'search'])->name('counter.search');
    Route::get('/counter/create', [CounterController::class, 'create'])->name('counter.create');
    Route::post('/counter/store', [CounterController::class, 'store'])->name('counter.store');
    Route::get('/counter/{counter}/show', [CounterController::class, 'show'])->name('counter.show');
    Route::get('/counter/{counter}/edit', [CounterController::class, 'edit'])->name('counter.edit');
    Route::patch('/counter/{counter}/update', [CounterController::class, 'update'])->name('counter.update');
    Route::delete('/counter/{counter}/destroy', [CounterController::class, 'destroy'])->name('counter.destroy');

    // Route::get('/condition', [ConditionController::class, 'index'])->name('condition.index');
    // Route::get('/condition/{condition}/show', [ConditionController::class, 'show'])->name('condition.show');
    Route::delete('/condition/{condition}/destroy', [ConditionController::class, 'destroy'])->name('condition.destroy');
    

    
    
});


//Admin
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/sector', [SectorController::class, 'index'])->name('sector.index');
    Route::get('/sector/create', [SectorController::class, 'create'])->name('sector.create');
    Route::get('/sector/{sector}/show', [sectorController::class, 'show'])->name('sector.show');
    Route::post('/sector/store', [SectorController::class, 'store'])->name('sector.store');
    Route::get('/sector/{sector}/edit', [SectorController::class, 'edit'])->name('sector.edit');
    Route::patch('/sector/{sector}/update', [SectorController::class, 'update'])->name('sector.update');
    Route::delete('/sector/{sector}/destroy', [SectorController::class, 'destroy'])->name('sector.destroy');
    
    

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::patch('/user/{user}/update', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
    Route::patch('/sector/user/{user}/destroy', [UserController::class, 'userDestroy'])->name('sector.user.destroy');
    Route::patch('/sector/user/{sector}/update', [UserController::class, 'userUpdate'])->name('sector.user.update');

    Route::get('/caseDetails', [CaseDetailsController::class, 'index'])->name('caseDetails.index');
    Route::delete('/caseDetails/{caseDetails}/destroy', [CaseDetailsController::class, 'destroy'])->name('caseDetails.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
