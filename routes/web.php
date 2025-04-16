<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Member\Auth\MemberLoginController;

use App\Http\Controllers\Admin\MemberRegistersController;
use App\Http\Controllers\Admin\TeamMeetingController;
use App\Http\Controllers\Admin\GroupmemberController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\TeamattendanceController;

use App\Http\Controllers\Member\DashboardController;
use App\Http\Controllers\Member\GroupController as Membergroupcontroller;
use App\Http\Controllers\Member\GroupMeetingController;
use App\Http\Controllers\Member\Auth\RegisterController;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/login', function () {
//     if (Auth::guard('member')->check()) {
//         return redirect()->route('memberdashboard'); 
//     } elseif (Auth::guard('admin')->check()) {
//         return redirect()->route('memberlogin'); 
//     }
    
//     return redirect()->route('memberlogin'); 
// })->name('login');






Route::get('/login', function () {
    if (Auth::guard('member')->check()) {
        return redirect()->route('adminlogin'); 
    }
    return redirect()->route('memberlogin'); 
})->name('login');

// Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('adminlogin');
    Route::post('/login', [AdminLoginController::class, 'adminloginform'])->name('adminloginform');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('adminlogout');

    Route::middleware('auth:admin')->group(function () {
        Route::resource('/registers', MemberRegistersController::class);
        Route::get('/dashboard', [MemberRegistersController::class,'dashboard'])->name('dashboard');
        Route::resource('/groupmember', GroupmemberController::class);
        Route::resource('/group', GroupController::class);
        Route::resource('/teamMeeting', TeamMeetingController::class);
          Route::resource('/teamattendance', TeamattendanceController::class);
        Route::get('memberrole', [TeamattendanceController::class, 'member'])->name('memberlist');

    });
});

// Member routes
Route::resource('/register', RegisterController::class);
Route::prefix('member')->group(function () {
    Route::get('/login', [MemberLoginController::class, 'showLoginForm'])->name('memberlogin');
    Route::post('/login', [MemberLoginController::class, 'memberloginform'])->name('memberloginform');
    Route::post('/logout', [MemberLoginController::class, 'logout'])->name('memberlogout');
    Route::get('/forgotpassword',[MemberLoginController::class, 'forgotpassword'])->name('forgotpassword');
    Route::post('/forgotpassword',[MemberLoginController::class, 'forgotform'])->name('forgotpasswordform');
    

    Route::middleware('auth:member')->group(function () {
        Route::resource('/groupmeeting', GroupMeetingController::class);
        Route::resource('/membergroup', Membergroupcontroller::class);
        Route::get('/group-dashboard',[Membergroupcontroller::class, 'dashboard'])->name('groupdashboard');
        Route::get('/member-dashboard',[DashboardController::class, 'dashboard'])->name('memberdashboard');
    });
});