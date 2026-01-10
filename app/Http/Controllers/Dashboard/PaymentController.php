<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\StorePaymentRequest;
use App\Models\Client;
use App\Models\Payment;
use App\Services\ReceiptService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function listClients()
    {
        //dd(5);
        $clients = Client::paginate(10);   //muestra lista de clientes para pagos
        return view('dashboard.client.payment.listClients', compact('clients'));
    }

    public function showClient(Client $client)
    {
        return view('dashboard.client.payment.showClient', compact('client'));  //muestra cliente seleccionado
    }

    public function storePayment(StorePaymentRequest $request, ReceiptService $receiptService)
    {
        $receiptNumber = $receiptService->generateReceiptNumber();  //generar numero de recibo

        $data = $request->validated();    //valida datos
        $data['receipt_number'] = $receiptNumber;   //se agrega el número de recibo

        Payment::create($data);  //guarda el pago

        return redirect()->back()->with('success', 'El pago fue registrado correctamente');
        //return redirect()->route('payment.showPayment', $request->client_id)->with('success', 'Pago registrado correctamente');
    }

    public function showPayment(Client $client)
    {
        return view('dashboard.client.payment.showPayment', compact('client'));  //muestra los pagos de un cliente
    }

    public function voucher(Client $client)
    {
        $payment = Payment::where('client_id', $client->id)    //busca por id   
            ->latest()    //busca el ultimo pago del cliente
            ->first();    //solo un pago

        if (!$payment) {   //valida que existan pagos
            return redirect()->back()->with('error', 'No hay pagos registrados');
        }

        return view('dashboard.client.payment.voucher', compact('client', 'payment'));
    }

    public function downloadVoucherPdf (Payment $payment)
    {
        $client = $payment->client;   //obtiene el cliente realacionado al pago
        
        $pdf = Pdf::loadView('dashboard.client.payment.voucher-pdf', compact('client', 'payment')); //convierte una vista blade en pdf

        //return $pdf->download('comprobante_'.$payment->receipt_number.'.pdf');   //descarga el pdf directamente

        return $pdf->stream('comprobante_'.$payment->receipt_number.'.pdf'); //muestra el pdf en el navegador
    }
}
