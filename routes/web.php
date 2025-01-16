<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\EquipmentTypeController;
use App\Http\Controllers\Admin\ShippingCaseController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

//Route For Admin
Route::group(['prefix' => 'admin'], function () {
    //Client Route
    Route::group(['prefix' => 'clients'], function () {
        Route::get('/get_json', [UserController::class, 'getJson']);        
        Route::get('/', [UserController::class, 'index'])->name('admin.clients.index');       
    });

    //Contacts
    Route::group(['prefix' => 'contacts'], function () {
        Route::get('/', [ContactController::class, 'getData'])->name('admin.contacts.index');        
        
    });

    //ShippingCase Route
    Route::group(['prefix' => 'shipping-cases'], function () {
        Route::get('/', [ShippingCaseController::class, 'getData'])->name('admin.shipping-cases.index');        
        
    });

    //Equipment Route
    Route::group(['prefix' => 'equipments'], function () {
        Route::get('/', [EquipmentController::class, 'getData'])->name('admin.equipments.index');        
        
    });

    //EquipmentType Route
    Route::group(['prefix' => 'equipment-types'], function () {
        Route::get('/', [EquipmentTypeController::class, 'getData'])->name('admin.equipment-types.index');        
        
    });
});

 
