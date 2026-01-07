<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\StorePaymentRequest;
use App\Models\Client;
use App\Models\Payment;
use App\Services\ReceiptService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function listClients()
    {
        //Mostrar lista de clientes 
        //dd(5);
        $clients = Client::paginate(10);
        return view('dashboard.client.payment.listClients', compact('clients'));
    }

    public function showClient(Client $client)
    {
        return view('dashboard.client.payment.showClient', compact('client'));
    }

    public function storePayment(StorePaymentRequest $request, ReceiptService $receiptService)
    {
        $receiptNumber = $receiptService->generateReceiptNumber();

        $data = $request->validated();
        $data['receipt_number'] = $receiptNumber;

        Payment::create($data);

        return redirect()->back()->with('success', 'El pago fue registrado correctamente');
        //return redirect()->route('payment.showPayment', $request->client_id)->with('success', 'Pago registrado correctamente');
    }

    public function showPayment(Client $client)
    {
        return view('dashboard.client.payment.showPayment', compact('client'));
    }

    public function voucher(Client $client)
    {
        $payment = Payment::where('client_id', $client->id)
            ->latest()
            ->first();

        if (!$payment) {
            return redirect()->back()->with('error', 'No hay pagos registrados');
        }

        return view('dashboard.client.payment.voucher', compact('client', 'payment'));
    }
}
