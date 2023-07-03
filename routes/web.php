<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

use App\Http\Controllers\LectureController;
use App\Http\Controllers\SubmitController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PrintCotroller;
use App\Http\Controllers\ExportExcel;
use App\Http\Controllers\FileController;
use App\Settings\GeneralSettings;
use App\Settings\CustomSettings;

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
/* COMMON */
Route::view('/','static.home')->name('home');
/* USER */
Route::name('lecture.login')->group(function () {
    Route::view('/abstracts/login','lecture.login');
    Route::post('/abstracts/login', [LectureController::class,'checkApplier']);
});
Route::resource('abstracts', LectureController::class)->parameters(['abstracts'=>'lecture'])->names('lecture');
Route::name('submit.login')->group(function () {
    Route::view('/applies/login','submit.login');
    Route::post('/applies/login', [SubmitController::class,'checkApplier']);
});
Route::resource('applies', SubmitController::class)->parameters(['applies'=>'submit'])->names('submit');
// static pages
foreach(config('menu.static.sub') as $menu) Route::view('/'.Str::after($menu,'.'),$menu)->name($menu);

// Print KS 221219
Route::get('applies/{id}/{print}',PrintCotroller::class)->name('submit.print');


Route::post('/fileupload', [FileController::class, 'upload'])->name('fileupload');
Route::get('/filedown/{original}/{filename}', [FileController::class, 'download'])->name('filedown');

// 20221109 KS -----------------------------------------------------------------
/* ADMIN */
Route::prefix('admin')->group(function () {
    Route::view('/login', 'admin.login')->name('admin.login');
    Route::view('','admin.login')->name('admin.login');
    Route::get('/lectures', [AdminController::class,'listLectures'])->name('admin.lectures');
    // 관리자 로그인 첫 페이지
    Route::post('/login', [AdminController::class,'logIn'])->name('admin.login');
    // 로그 아웃
    Route::get('/logout', [AdminController::class, 'logOut'])->name('admin.logout');

    /************************************** admin/Submit 부분 **************************************/
Route::prefix('submit')->group(function(){
        // 사전등록 List
        Route::get('/list', [AdminController::class, 'submitList'])->name('admin.submit.list');
        // 사전등록 Staus 변경
        Route::post('/status', [AdminController::class, 'changeStatus'])->name('admin.submit.status');
        // 사전등록 삭제
        Route::get('/delete/{id}', [AdminController::class, 'submitDelete'])->name('admin.submit.delete');
        // 사전등록 휴지통
        Route::get('/trash',[AdminController::class, 'submitTrash'])->name('admin.submit.trash');
        // 사전등록 휴지통 복구
        Route::get('/deleted/restore/{id}', [AdminController::class, 'submitDeleteRestore'])->name('admin.submit.delete.restore');
        // 엑셀 출력
        Route::get('/excel', [ExportExcel::class, 'submitExcel'])->name('admin.submit.excel');
    });        
    /************************************** Submit 부분끝 **************************************/

    /************************************** Lecture 부분  **************************************/
Route::prefix('lecture')->group(function(){
        // 초록등록 List
        Route::get('/list', [AdminController::class, 'lectureList'])->name('admin.lecture.list');
        // 초록 등록 Modify 
        Route::get('/modify/{id}', [AdminController::class, 'lectureModify'])->name('admin.lecture.modify');
        // 사전등록 삭제
        Route::get('/delete/{id}', [AdminController::class, 'lectureDelete'])->name('admin.lecture.delete');
        // 사전등록 휴지통
        Route::get('/trash',[AdminController::class, 'lecturetrash'])->name('admin.lecture.trash');
        // 사전등록 휴지통 복구
        Route::get('/deleted/restore/{id}', [AdminController::class, 'lectureDeleteRestore'])->name('admin.lecture.delete.restore');
        // 엑셀 출력
        Route::get('/excel', [ExportExcel::class, 'lectureExcel'])->name('admin.lecture.excel');
    });  
    /************************************** Lecture 부분끝 *************************************/
    
    Route::get('/setting/system',function(GeneralSettings $settings) {
        return view('admin.layouts.setting-general',$settings);
    })->name('admin.setting-general');
    Route::get('/setting/config',function(CustomSettings $settings) {
        return view('admin.layouts.setting-custom',$settings);
    })->name('admin.setting-custom');
});
