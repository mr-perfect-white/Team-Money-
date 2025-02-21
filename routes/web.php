<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MemberRegistersController;
use App\Http\Controllers\Admin\GroupMeetingController;
use App\Http\Controllers\Admin\TeamMeetingController;
use App\Http\Controllers\Admin\GroupmemberController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\TeamAddendanceController;
use App\Http\Controllers\Member\Auth\MemberLoginController;
use App\Http\Controllers\Auth\LoginController;




// Route::get('/', function () {
//     return view('member.auth.login');
// });

//Auth::routes();

// Route::get('admin/login', function()
// {
// return view('admin.auth.login');
// });
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::resource('/registers', MemberRegistersController::class);
Route::middleware('auth:user')->group(function () {
  
    Route::get('/dashboard', [MemberRegistersController::class,'dashboard'])->name('dashboard');
    Route::resource('/groupmembers', GroupmemberController::class);
    Route::resource('/groups', GroupController::class);
    Route::resource('/teammeeting', TeamMeetingController::class);
    Route::get('/attendance/{meeting_id}', [TeamAddendanceController::class,'index'])->name('admin.meetings.attendance');
    Route::post('/attendance/store', [TeamAddendanceController::class,'store'])->name('attendance.store');
  
});

Route::get('/', [MemberLoginController::class, 'showLoginForm'])->name('members.login');
Route::get('/register', [MemberLoginController::class, 'showRegisterForm'])->name('register');
Route::post('/', [MemberLoginController::class, 'login'])->name('member.login');
Route::post('member-logout', [MemberLoginController::class, 'logout'])->name('member.logout');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth:member')->group(function () {
    Route::resource('/groupmeeting', GroupMeetingController::class);
    Route::get('/member-dashboard',[GroupMeetingController::class, 'dashboard'])->name('memberdashboard');
});