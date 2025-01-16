<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\EquipmentTypeController;
use App\Http\Controllers\Admin\ShippingCaseController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;

// Public route for home page
Route::get('/', function () {
    return view('home');
});

Auth::routes();

//Route For Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    //Dashboard Route
    Route::group(['prefix' => 'dashboard'], function () {        
        Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');       
    });

    //Client Route
    Route::group(['prefix' => 'clients'], function () {
        Route::get('/get_json', [UserController::class, 'getJson'])->name('admin.clients.get_json'); 

        Route::get('/', [UserController::class, 'index'])->name('admin.clients.index'); 
        Route::get('/create', [UserController::class, 'create'])->name('admin.clients.create');       
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.clients.edit');     
        Route::post('/store', [UserController::class, 'store'])->name('admin.clients.store');     
        Route::post('/update', [UserController::class, 'update'])->name('admin.clients.update');    
        Route::delete('/delete/{id}', [UserController::class, 'edit'])->name('admin.clients.destory');     
    });

    //Contacts
    Route::group(['prefix' => 'contacts'], function () {
        Route::get('/get_json', [ContactController::class, 'getJson']);        
        Route::get('/', [ContactController::class, 'index'])->name('admin.contacts.index');        
        
    });

    //ShippingCase Route
    Route::group(['prefix' => 'shipping-cases'], function () {
        Route::get('/get_json', [ShippingCaseController::class, 'getJson']);        
        Route::get('/', [ShippingCaseController::class, 'index'])->name('admin.shipping-cases.index');        
        
    });

    //Equipment Route
    Route::group(['prefix' => 'equipments'], function () {
        Route::get('/get_json', [EquipmentController::class, 'getJson']);        
        Route::get('/', [EquipmentController::class, 'index'])->name('admin.equipments.index');        
        
    });

    //EquipmentType Route
    Route::group(['prefix' => 'equipment-types'], function () {
        Route::get('/get_json', [EquipmentTypeController::class, 'getJson']);        
        Route::get('/', [EquipmentTypeController::class, 'index'])->name('admin.equipment-types.index');        
        
    });
});

 
