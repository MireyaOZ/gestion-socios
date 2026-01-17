<?php

use App\Http\Controllers\Dashboard\ClientController;
use App\Http\Controllers\Dashboard\PaymentController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');  //ruta para solo usuarios logueados

Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {       //ruta de recurso que crea un CRUD completo para client
    Route::resources(
        [
            'client' => ClientController::class,
        ]
    );     
});

/*Route::post('dashboard/client/store', [ClientController::class, 'store'])->name('client.store');*/


//RUTAS PARA PAYMENT
Route::get('/dashboard/payment', [PaymentController::class, 'listClients'])
    ->name('payment.listClients');    //ruta que muestra la lista de clientes para seleccionar quien registrará el pago

Route::get('/dashboard/payment/{client}', [PaymentController::class, 'showClient'])
    ->name('payment.showClient');  //ruta que muestra la información de un cliente en específico

Route::post('/dashboard/payment/storePayment', [PaymentController::class, 'storePayment'])
    ->name('payment.storePayment');  //ruta para guardar un pago

Route::get('/dashboard/payment/showPayment/{client}', [PaymentController::class, 'showPayment'])
    ->name('payment.showPayment');    //ruta que muestra los pagos de un cliente en específico

Route::get('/dashboard/payment/{client}/voucherLast', [PaymentController::class, 'voucherLast'])
    ->name('payment.voucherLast');   //ruta del ultimo comprobante de pago de un cliente

Route::get('/dashboard/payment/{payment}/voucher', [PaymentController::class, 'voucher'])
    ->name('payment.voucher');   //ruta para ver un comprobante de pago en específico

Route::get('/dashboard/payment/{payment}/downloadVoucherPdf', [PaymentController::class, 'downloadVoucherPdf'])
    ->name('payment.downloadVoucherPdf');   //ruta de la descarga del pdf

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
