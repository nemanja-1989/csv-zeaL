<?php

use Illuminate\Support\Facades\Route;

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
});

//Authentication
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Admin User Managment 
Route::namespace("Admin")->prefix("admin")->name("admin.")->middleware("can:manage-users")->group(function() {
    Route::resource("/users", "UserController")->except(["create", "store", "show"]);
});

//Exort ImportUsers
Route::get("/export/import-users", "ExportExcelController@export")->name("export.importUsers");

//Import ImportUsers
Route::get("/import/import-users-list", "ImportExcelController@index")->name("imports.index");
Route::post("/import/import-users", "ImportExcelController@import");

//Get Import users API
Route::get("/get-import-users", function() {
    
    return view("API.index");
});