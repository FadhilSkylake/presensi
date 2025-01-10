<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Presensi;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AttendanceExport;

Route::group(['middleware' => 'auth',], function () {
    Route::get('presensi', Presensi::class)->name('presensi');
    Route::get('attendace/export', function () {
        return Excel::download(new AttendanceExport, 'attendances.xlsx');
    })->name('attendance-export');
});

Route::get('/login', function () {
    return redirect('admin/login');
})->name('login');

Route::get('/', function () {
    return view('welcome');
});
