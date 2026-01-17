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
    public function listClients(Request $request)
    {
        //Antes de agregar la búsqueda
        //dd(5);
        /*$clients = Client::paginate(10);   //muestra lista de clientes para pagos
        return view('dashboard.client.payment.listClients', compact('clients'));*/

        $search = $request->input('search');   //Se obtiene el valor del input que es search (texto de búsqueda)

        $clients = Client::when($search, function ($query, $search) {    //ejecuta consulta si search tiene valor
        $query->where('name', 'LIKE', "%{$search}%")      //filtra por columna name, LIKE busca coincidencias, % valor antes o después
              ->orWhere('curp', 'LIKE', "%{$search}%")   //buscar en otras columnas 
              ->orWhere('contract_number', 'LIKE', "%{$search}%");
    })
        /*->orderBy('id', 'desc')*/  //ordena por id del mas reciente al más antiguo
        ->paginate(10);

        return view('dashboard.client.payment.listClients', compact('clients'));
    }

    public function showClient(Client $client)
    {
        return view('dashboard.client.payment.showClient', compact('client'));  //muestra cliente seleccionado
    }

    public function storePayment(StorePaymentRequest $request, ReceiptService $receiptService)  //llama el servicio ReceiptService 
    {
        $receiptNumber = $receiptService->generateReceiptNumber();  //generar numero de recibo

        $data = $request->validated();    //valida datos
        $data['receipt_number'] = $receiptNumber;   //se agrega el número de recibo

        Payment::create($data);  //guarda el pago

        return redirect()->back()->with('success', 'El pago fue registrado correctamente'); //regresa a la página anterior y muestra el mensaje
        //return redirect()->route('payment.showPayment', $request->client_id)->with('success', 'Pago registrado correctamente');
    }

    public function showPayment(Client $client)
    {
        $payments = $client->payments()->orderBy('created_at', 'desc')->paginate(10);  //Se llama la relación payments del modelo Client para obtener los pagos que pertenecen a un cliente en especifico

        return view('dashboard.client.payment.showPayment', compact('client', 'payments'));  //muestra los pagos de un cliente
    }

    public function voucherLast(Client $client)
    {
        $payment = $client->payments()  //llama a la relación con payments del modelo Client para acceder a los pagos de un cliente  
            ->latest()    //busca el ultimo pago del cliente
            ->first();    //solo un pago

        if (!$payment) {   //valida que existan pagos
            return redirect()->back()->with('error', 'No hay pagos registrados');
        }

        return view('dashboard.client.payment.voucher', compact('client', 'payment'));
    }

    public function voucher(Payment $payment)
    {
        $client = $payment->client; //obtiene el cliente asociado a un pago

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
