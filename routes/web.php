<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PruebaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\TrainerController;
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
Route::get('/trainers/create', [TrainerController::class, 'create']);

Route::resource('/trainers', TrainerController::class);


Route::get('rutaprueba',[PruebaController::class,'prueba2']);

Route::get('/h',[HomeController::class,'Home']);

Route::get('catalog',[CatalogController::class,'Catalogo']);

Route::get('catalog/show/{id}',[CatalogController::class,'show']);

Route::get('catalog/create',[CatalogController::class,'create']);

Route::get('catalog/edit/{id}',[CatalogController::class,'edit']);

Route::get('/login', function (){
    return view('login');
});

Route::get('/', function (){
    return view('welcome');
});

Route::get('/mi_primer_ruta', function () {
    return 'Hola Pao';
});

Route::get('/name/{name}', function ($name) {
    return 'Hola soy '.$name;
});

Route::get('/name/{name}/lastname/{apellido}', function ($name,$apellido) {
    return 'Hola soy '.$name. ' '.$apellido;
});

Route::get('/name/{name}/lastname/{apellido?}', function ($name,$apellido=null) {
    return 'Hola soy '.$name. ' '.$apellido;
});

Route::get('/name/{name}/lastname/{apellido?}', function ($name,$apellido='Gonzalez') {
    return 'Hola soy '.$name. ' '.$apellido;
});

Route::get('/num/{numero}/num2/{numero2}', function ($numero,$numero2) {
    $suma=$numero+$numero2;
    return 'La suma es: '.$suma;
});

//EJERCICIO 1
Route::get('/mm', function () {
    return 'Pantalla Principal';
});

//EJERCICIO 2
Route::get('/loginn', function () {
    return 'Login Usuario';
});

//EJERCICIO 3
Route::get('/logout', function () {
    return 'Logout Usuario';
});

//EJERCICIO 4
Route::get('/catalogo', function () {
    return 'Listado Peliculas';
});

//EJERCICIO 5
Route::get('/catalogo/{catalogo}/show/{show}/id/{id}', function ($catalogo, $show, $id) {
    return 'Catalogo de '.$catalogo.' '. $show.' '.$id;
});

//EJERCICIO 5

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
