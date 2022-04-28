<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IdagentController;

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

Route::get('/', function () {
    //return view('welcome');
    return view('auth/login');
});

Route::group([
    "middleware" => ["auth", "auth.admin"],
    ], function(){

        /*Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');*/
        Route::get('/dashboard', [IdagentController::class, 'index'])->name('dashboard');

        /* cette route permet de faire la recherche */
        Route::get('/dashboard/recheche/', [IdagentController::class, 'searche'])->name('searche');

        Route::post('/dashboard/store/agent', [IdagentController::class, 'store'])->name('store');
        Route::get('/dashboard/delete/agent/{id}', [IdagentController::class, 'destroy'])->name('delete');
        ///dashboard/edit-one-agent/agent/{id}
        Route::get('/dashboard/edit-one-agent/agent/{id}', [IdagentController::class, 'edit'])->name('edit');
        Route::put('/dashboard/update/agent', [IdagentController::class, 'update'])->name('agent.update');
    }
);

/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
*/

require __DIR__.'/auth.php';

Route::fallback(function(){
    return view('auth/login'); //'view 404';
});