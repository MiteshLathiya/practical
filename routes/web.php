<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\EmployeeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[IndexController::class,'index']);

Route::get('/Register',[EmployeeController::class,'index'])->name('register');
Route::post('/Register/User',[EmployeeController::class,'store']);

//Admin
Route::get('/Admin',[AdminController::class,'index'])->name('login');
Route::post('/Login',[AdminController::class,'adminlogin']);
Route::get('/Logout',[AdminController::class,'adminlogout']);

//Dashboard
Route::get('/Dashboard',[DashboardController::class,'index'])->middleware('auth');
Route::get('/Dashboard/AddCompany',[CompanyController::class,'index']);
Route::post('/Dashboard/AddCompany',[CompanyController::class,'store']);
Route::get('/Dashboard/EditCompany',[CompanyController::class,'viewcompany']);
Route::get('/Dashboard/ShowEmployee',[CompanyController::class,'viewemployee']);
Route::get('/Dashboard/TotalEmployee',[CompanyController::class,'totalemployee']);









