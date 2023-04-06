<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\InputController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\URL;

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
    return view('welcome');
})->name('home');

Route::get('/faiz', function() {
    return 'Faizal';
});

Route::redirect('/instagram', '/welcome');

Route::fallback(function() {
    return '404 Not Found';
});

Route::get('/hello/{name}', function($name) {
    return view('hello', [
        'name' => $name
    ]);
});

Route::get('/products/{id}', function($Prodid) {
    return 'Product ID: ' . $Prodid;
});

Route::get('/products/{id}/name/{name}', function($Prodid, $ProdName) {
    return 'Product ID: ' . $Prodid . '<br/> Product Name: ' . $ProdName;
});

//regex
Route::get('/categories/{id}', function($id) {
    return 'Category ID: ' . $id;
})->where('id', '[0-9]+');

Route::get('/users/{id?}', function($id = '404') {
    return 'User ID: ' . $id;
})->name('users.detail');


Route::get('/controller/hello', [HelloController::class, 'index']);

Route::get('/controller/hello/request', [HelloController::class, 'request']);

Route::get('/controller/hello/{name}', [HelloController::class, 'hello']);

Route::get('/controller/input', [InputController::class, 'hello']);

Route::post('/controller/input', [InputController::class, 'hello']);

Route::post('/controller/input/firstname', [InputController::class, 'helloFirstname']);

Route::post('/controller/input/all', [InputController::class, 'helloAll']);

Route::post('/controller/input/filterOnly', [InputController::class, 'filterOnly']);

Route::post('/controller/input/filterExcept', [InputController::class, 'filterExcept']);

Route::post('/controller/upload', [FileController::class, 'store']);

Route::get('/response/hello', [ResponseController::class, 'response'])->middleware(['contoh']);


Route::get('/redirect/to', function() {
    return redirect()->route('home');
});

Route::get('/redirect/action', function() {
    return redirect()->action([HelloController::class, 'index']);
});


Route::prefix('admin')->group(function() {
    Route::get('/users', function() {
        return 'Admin Users';
    });
});

Route::middleware(['auth'])->group(function() {
    Route::get('/admin/users', function() {
        return 'Admin Users';
    });
});

Route::controller(HelloController::class)->group(function() {
    Route::get('/controller/hello', 'index');
    Route::get('/controller/hello/request', 'request');
    Route::get('/controller/hello/{name}', 'hello');
});

Route::get('/url/{name}', function($name) {
    return url()->current();
})->name('url.name');

URL::action([HelloController::class, 'index']);

Route::controller(SessionController::class)->group(function() {
    Route::get('/session/create', 'createSession')->name('session.create');
    Route::get('/session/show', 'showSession')->name('session.show');
    Route::get('/session/delete', 'deleteSession')->name('session.delete');
});


Route::prefix('status')->group(function() {
    Route::get('/200', function() {
        return response('OK', 200);
    });
    Route::get('/401', function() {
        return abort(401);
    });
    Route::get('/500', function() {
        return abort(500);
    });
});