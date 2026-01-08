<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Comprobante de Pago</title>

</head>
<body>

<div class="container">

    <!-- ENCABEZADO -->
    <div class="header">
        <h1>COMPROBANTE DE PAGO</h1>
        <p>Sistema de Gestión de Socios</p>
    </div>

    <!-- DATOS DEL SOCIO -->
    <div class="section">
        <div class="section-title">Datos del Socio</div>

        <table>
            <tr>
                <td class="label">Nombre:</td>
                <td>{{ $client->name }}</td>
            </tr>
            <tr>
                <td class="label">Contrato:</td>
                <td>{{ $client->contract_number }}</td>
            </tr>
            <tr>
                <td class="label">CURP:</td>
                <td>{{ $client->curp }}</td>
            </tr>
        </table>
    </div>

    <!-- DATOS DEL PAGO -->
    <div class="section">
        <div class="section-title">Datos del Pago</div>

        <table>
            <tr>
                <td class="label">Número de recibo:</td>
                <td>{{ $payment->receipt_number }}</td>
            </tr>
            <tr>
                <td class="label">Monto pagado:</td>
                <td>${{ number_format($payment->amount, 2) }}</td>
            </tr>
            <tr>
                <td class="label">Fecha de pago:</td>
                <td>{{ $payment->created_at->format('d/m/Y') }}</td>
            </tr>
        </table>
    </div>

    <!-- PIE DE PÁGINA-->
    <div class="footer">
        <p>Este documento es un comprobante de pago.</p>
        <p>Gracias por su preferencia.</p>
    </div>

</div>

</body>
</html>
