<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PpidController;
use App\Models\Employee;
use App\Models\Ppid;
use Illuminate\Support\Facades\Route;


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
    $jumlahpegawai = Employee::count();
    $jumlahppid          = Ppid::count();
    $total = $jumlahpegawai + $jumlahppid;
    // 
    $rangkumtgl = (new Ppid())->rangkum();
    $data1 = (new PpidController())->getData();
    $label1 = $rangkumtgl['dekade'];
    $hsl = $rangkumtgl['jumlah'];
    // 
    $data = (new EmployeeController())->getData1();
    $rekapsurat = (new Employee())->rekap();
    $label = $rekapsurat['periode'];
    $jml = $rekapsurat['jml']; 
    // 
    // Menambahkan dan menjumlahkan keduanya
    date_default_timezone_set('Asia/Jakarta');



    return view('welcome', compact('jumlahpegawai', 'jumlahppid', 'data','data1', "label", 'jml','label1','hsl'));
})->middleware('auth');

Route::get('/pegawai', [EmployeeController::class, 'index'])->name('pegawai')->middleware('auth');

Route::get('/tambahpegawai', [EmployeeController::class, 'tambahpegawai'])->name('tambahpegawai');
Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');


Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');
Route::post('/updatedata/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');

Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');

//EXPORT PDF
Route::get('/exportpdf', [EmployeeController::class, 'exportpdf'])->name('exportpdf');

//EXPORT EXCEL
Route::get('/exportexcel', [EmployeeController::class, 'exportexcel'])->name('exportexcel');

//IMPORT DATA
Route::post('/importexcel', [EmployeeController::class, 'importexcel'])->name('importexcel');

//LOGIN
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses'])->name('loginproses');

//REGISTER
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/registeruser', [LoginController::class, 'registeruser'])->name('registeruser');

//LOGOUT
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


//Halaman PPID STARTING

Route::get('/ppidpegawai', [PpidController::class, 'index'])->name('ppidpegawai')->middleware('auth');
Route::get('/tambahppid', [PpidController::class, 'tambahppid'])->name('tambahppid')->middleware('auth');

Route::post('/tambahdata', [PpidController::class, 'tambahdata'])->name('tambahdata');

Route::get('/tampilppid/{id}', [PpidController::class, 'tampilppid'])->name('tampilppid');
Route::post('/updateppid/{id}', [PpidController::class, 'updateppid'])->name('updateppid');
Route::get('/viewppid/{id}', [PpidController::class, 'viewppid'])->name('viewppid');





//EXPORT PDF
Route::get('/printpdf', [PpidController::class, 'printpdf'])->name('printpdf');
