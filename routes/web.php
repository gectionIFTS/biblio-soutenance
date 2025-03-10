<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\DemandeDeLectureController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\UserImportController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/demandes', [DemandeDeLectureController::class, 'store'])->name('demandes.store');
});
Route::group(['middleware' => 'auth'], function() {




    Route::get("/redirectAuthenticatedUsers", [RedirectAuthenticatedUsersController::class, "home"]);

    Route::group(['middleware' => 'checkRole:admin'], function() {
        
Route::get('/import-users/create',[UserImportController::class, 'index'])->name('imports.index');
Route::post('/import-users', [UserImportController::class, 'import'])->name('import.users');
        Route::resource('etudiants', EtudiantController::class);
        Route::get('/documentsall',[DocumentController::class,"index"])->name('user_documents_view');
        Route::get("/documentshow/{id}",[DocumentController::class,"show"])->name("documentshow");
        Route::post('/demandes/bulk-action', [DemandeDeLectureController::class, 'bulkAction'])->name('demandes.bulk-action');

        Route::get('/demandes', [DemandeDeLectureController::class, 'index'])->name('demandes.index');
        Route::post('/demandes/{demande}/accepter', [DemandeDeLectureController::class, 'accepter'])->name('demandes.accepter');
        Route::post('/demandes/{demande}/refuser', [DemandeDeLectureController::class, 'refuser'])->name('demandes.refuser');
        Route::get('/adminDashboard',[AdminDashboardController::class,'index'])->name('adminDashboard');
        Route::resource('documents',DocumentController::class);


        // Route::inertia('/adminDashboard','Admin')->name('adminDashboard');
    });
    Route::group(['middleware' => 'checkRole:user'], function() {
    
         Route::get("/document/{id}",[DocumentController::class,"show"])->name('document');
        Route::get('/demandes/index',[DemandeDeLectureController::class, 'demandeliste'])->name('demandes.list');
        Route::get('/documents/{document}/lecture', [DocumentController::class, 'lecture'])->name('documents.lecture');

       
        Route::get('/userDashboard',function(){
            return view("userDashboard");})->name('userDashboard');
        Route::get('/documentss',[DocumentController::class,"index2"])->name('user_documents_view');
        Route::get("/documentss/{id}",[DocumentController::class,"show"])->name("documentss.show");
    });

});


require __DIR__.'/auth.php';


Route::get('/droit',[ProfileController::class,'droit']);


?>





