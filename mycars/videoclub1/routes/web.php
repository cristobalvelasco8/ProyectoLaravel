<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;

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

Route::get('/', [HomeController::class, 'getWelcome'])->name('welcome');


Route::get('login', function(){
    return view('auth.login');
    //return 'Vista login';
});

Route::get('logout', function(){
    //return view('logout');
    return 'Vista logout usuario';
});

Route::get('catalog', [CatalogController::class, 'getIndex'])->name('List');

Route::get('catalog/show/{id?}', [CatalogController::class, 'getShow'])->name('Show');

Route::get('catalog/create', [CatalogController::class, 'getCreate'])->name('Create');

Route::get('catalog/edite/{id?}', [CatalogController::class, 'getEdit'])->name('Edit');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';