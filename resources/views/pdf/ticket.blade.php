<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
            font-size: 13px;
        }
        .header {
            background: #111827;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
        }
        .section {
            padding: 20px;
        }
        .section-title {
            font-size: 16px;
            margin-bottom: 5px;
            font-weight: bold;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top:15px;
        }
        th {
            background: #f3f4f6;
            padding: 10px;
            border-bottom: 2px solid #d1d5db;
            text-align: left;
            font-size: 13px;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 12px;
        }
        .total-container {
            margin-top: 20px;
            text-align: right;
            padding-right: 20px;
        }
        .total-label {
            font-size: 15px;
            font-weight: bold;
        }
        .total-value {
            font-size: 18px;
            font-weight: bold;
            color: #111827;
        }
        .footer {
            text-align: center;
            font-size: 11px;
            margin-top: 40px;
            color: #6b7280;
        }
        .logo {
            width: 120px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <div class="header">
        <img src="{{ public_path('figurarte.png') }}" class="logo" alt="Figurarte">
        <h1>Ticket de Compra</h1>
    </div>

    <!-- DATOS DEL CLIENTE -->
    <div class="section">
        <div class="section-title">Información del Cliente</div>
        <p><strong>Nombre:</strong> {{ $order->user->name }}</p>
        <p><strong>Email:</strong> {{ $order->user->email }}</p>
        <p><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
        <p><strong>Número de Orden:</strong> #{{ $order->id }}</p>
    </div>

    <!-- TABLA DE PRODUCTOS -->
    <div class="section">
        <div class="section-title">Productos Comprados</div>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cant.</th>
                    <th>Unitario</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach($order->items as $item)
                <tr>
                    <td>{{ $item->nombre_producto }}</td>
                    <td>{{ $item->cantidad }}</td>
                    <td>${{ number_format($item->precio_unitario, 2) }}</td>
                    <td>${{ number_format($item->precio_unitario * $item->cantidad, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- TOTAL FINAL -->
    <div class="total-container">
        <span class="total-label">Total:</span>
        <span class="total-value">${{ number_format($order->total, 2) }}</span>
    </div>

    <!-- FOOTER -->
    <div class="footer">
        © {{ date('Y') }} Figurarte — Gracias por tu compra.<br>
        Este documento sirve como comprobante digital.
    </div>

</body>
</html>
