<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('login', 301);
});

Route::get('/login', 'AuthController@loginView')->name('login');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/register', 'AuthController@registerView')->name('register');
Route::post('/register', 'AuthController@register')->name('register');
Route::post('/logout', 'AuthController@logout')->name('logout')->middleware('is.auth');

Route::middleware('is.admin')->namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard-data-user', 'DashboardController@userCount')->name('dashboard-data.user');
    Route::get('/dashboard-data-admin', 'DashboardController@adminCount')->name('dashboard-data.admin');
    Route::get('/dashboard-data-banned', 'DashboardController@bannedCount')->name('dashboard-data.banned');

    Route::resource('/coa', 'CoaController')->except('create', 'show');
    Route::resource('/coa-detail', 'CoaDetailController')->except('create', 'show');

    Route::get('/user', 'UserController@index')->name('user.index');
    Route::put('/user-make-admin/{id}', 'UserController@makeAdmin')->name('user.make-admin');
    Route::put('/user-remove-admin/{id}', 'UserController@removeAdmin')->name('user.remove-admin');
    Route::put('/user-ban-user/{id}', 'UserController@banUser')->name('user.ban-user');
    Route::put('/user-unban-user/{id}', 'UserController@unbanUser')->name('user.unban-user');
});

Route::middleware('is.auth')->namespace('User')->name('user.')->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard-data-purchase', 'DashboardController@purchaseCount')->name('dashboard-data.purchase');
    Route::get('/dashboard-data-sale', 'DashboardController@saleCount')->name('dashboard-data.sale');
    Route::get('/dashboard-data-cash-payment', 'DashboardController@cashPaymentCount')->name('dashboard-data.cash-payment');
    Route::get('/dashboard-data-cash-receipt', 'DashboardController@cashReceiptCount')->name('dashboard-data.cash-receipt');

    Route::resource('/coa', 'CoaController')->except('create', 'store', 'edit', 'update', 'destroy');
    Route::resource('/item', 'ItemController')->except('show');
    Route::resource('/purchase', 'PurchaseController');
    Route::resource('/sale', 'SaleController');
    Route::resource('/cash-payment', 'CashPaymentController');
    Route::resource('/cash-receipt', 'CashReceiptController');
    Route::resource('/general-entry', 'GeneralEntryController');
    Route::resource('/income-statement', 'IncomeStatementController');

    Route::get('get-item', 'ItemController@getItem')->name('item.get-item');

    Route::post('general-entry-print', 'GeneralEntryController@print')->name('general-entry.print');
    Route::post('income-statement-print', 'IncomeStatementController@print')->name('income-statement.print');
});
