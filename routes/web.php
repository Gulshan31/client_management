<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;

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
Route::get('/admin/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('/admin/project',[ProjectController::class,'index'])->name('project');
Route::get('/admin/project/add',[ProjectController::class,'add'])->name('add-project');
Route::post('/admin/project/create',[ProjectController::class,'store'])->name('create-project');
Route::get('/admin/download/{id}',[ProjectController::class,'downloadFiles'])->name('files-download');
Route::get('/admin/download/pdf/{id}',[ProjectController::class,'downloadPDF'])->name('download-pdf');
Route::get('/edit/{id}',[ProjectController::class,'returnEditView'])->name('edit-project');
Route::post('/update/{id}',[ProjectController::class,'update'])->name('update-project');
Route::post('/download/all',[ProjectController::class,'downloadAll'])->name('download-all');