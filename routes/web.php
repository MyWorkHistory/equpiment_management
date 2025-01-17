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
        Route::put('/update/{id}', [UserController::class, 'update'])->name('admin.clients.update');    
        Route::delete('/destroy', [UserController::class, 'destroy'])->name('admin.clients.destroy');     
    });

     //EquipmentType Route
     Route::group(['prefix' => 'equipment-types'], function () {        
        Route::get('/get_json', [EquipmentTypeController::class, 'getJson'])->name('admin.equipment-types.get_json'); 
        Route::get('/', [EquipmentTypeController::class, 'index'])->name('admin.equipment-types.index'); 
        Route::get('/create', [EquipmentTypeController::class, 'create'])->name('admin.equipment-types.create');       
        Route::get('/edit/{id}', [EquipmentTypeController::class, 'edit'])->name('admin.equipment-types.edit');             
        Route::post('/store', [EquipmentTypeController::class, 'store'])->name('admin.equipment-types.store');     
        Route::put('/update/{id}', [EquipmentTypeController::class, 'update'])->name('admin.equipment-types.update');    
        Route::delete('/destroy', [EquipmentTypeController::class, 'destroy'])->name('admin.equipment-types.destroy');    
    });

    //ShippingCase Route
    Route::group(['prefix' => 'shipping-cases'], function () {
        Route::get('/get_json', [ShippingCaseController::class, 'getJson'])->name('admin.shipping-cases.get_json'); 
        Route::get('/', [ShippingCaseController::class, 'index'])->name('admin.shipping-cases.index'); 
        Route::get('/create', [ShippingCaseController::class, 'create'])->name('admin.shipping-cases.create');       
        Route::get('/edit/{id}', [ShippingCaseController::class, 'edit'])->name('admin.shipping-cases.edit');             
        Route::post('/store', [ShippingCaseController::class, 'store'])->name('admin.shipping-cases.store');     
        Route::put('/update/{id}', [ShippingCaseController::class, 'update'])->name('admin.shipping-cases.update');    
        Route::delete('/destroy', [ShippingCaseController::class, 'destroy'])->name('admin.shipping-cases.destroy');        
    });

 
    //Contacts
    Route::group(['prefix' => 'contacts'], function () { 
        Route::get('/get_json', [ContactController::class, 'getJson'])->name('admin.contacts.get_json'); 
        Route::get('/', [ContactController::class, 'index'])->name('admin.contacts.index'); 
        Route::get('/create', [ContactController::class, 'create'])->name('admin.contacts.create');       
        Route::get('/edit/{id}', [ContactController::class, 'edit'])->name('admin.contacts.edit');             
        Route::post('/store', [ContactController::class, 'store'])->name('admin.contacts.store');     
        Route::put('/update/{id}', [ContactController::class, 'update'])->name('admin.contacts.update');    
        Route::delete('/destroy', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');          
    });

    

    //Equipment Route
    Route::group(['prefix' => 'equipments'], function () {        
        Route::get('/get_json', [EquipmentController::class, 'getJson'])->name('admin.equipments.get_json'); 
        Route::get('/', [EquipmentController::class, 'index'])->name('admin.equipments.index'); 
        Route::get('/create', [EquipmentController::class, 'create'])->name('admin.equipments.create');       
        Route::get('/edit/{id}', [EquipmentController::class, 'edit'])->name('admin.equipments.edit');             
        Route::post('/store', [EquipmentController::class, 'store'])->name('admin.equipments.store');     
        Route::post('/update/{id}', [EquipmentController::class, 'update'])->name('admin.equipments.update');    
        Route::delete('/destroy', [EquipmentController::class, 'destroy'])->name('admin.equipments.destroy');          
    });

   
    
});

 
