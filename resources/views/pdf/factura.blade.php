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
        .logo {
            width: 120px;
            margin-bottom: 10px;
        }
        .section {
            padding: 20px;
        }
        .box {
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 15px;
            background: #f9fafb;
            margin-bottom: 20px;
        }
        .box p {
            margin: 4px 0;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
            border-bottom: 2px solid #e5e7eb;
            padding-bottom: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
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
        .total-box {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            width: 40%;
            float: right;
            background: #f3f4f6;
        }
        .total-box p {
            margin: 6px 0;
            font-size: 14px;
        }
        .total-box .total-final {
            font-size: 18px;
            font-weight: bold;
            color: #111827;
        }
        .footer {
            text-align: center;
            font-size: 11px;
            margin-top: 40px;
            color: #6b7280;
            clear: both;
        }
    </style>
</head>
<body>

    <!-- ENCABEZADO -->
    <div class="header">
        <img src="{{ public_path('figurarte.png') }}" class="logo" alt="Figurarte">
        <h1>Factura Simplificada</h1>
    </div>

    <!-- INFORMACIÓN GENERAL -->
    <div class="section">

        <div class="section-title">Detalles de la Factura</div>

        <div class="box">
            <p><strong>Factura No.:</strong> FAC-{{ $order->id }}</p>
            <p><strong>Fecha de emisión:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
            <p><strong>Número de Orden:</strong> #{{ $order->id }}</p>
        </div>

        <div class="section-title">Datos del Cliente</div>
        <div class="box">
            <p><strong>Nombre:</strong> {{ $order->user->name }}</p>
            <p><strong>Email:</strong> {{ $order->user->email }}</p>
        </div>

        <!-- TABLA DE PRODUCTOS -->
        <div class="section-title">Productos</div>

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

        <!-- RESUMEN -->
        <div class="total-box">
            <p><strong>Subtotal:</strong> ${{ number_format($subtotal, 2) }}</p>
            <p><strong>IVA (16%):</strong> ${{ number_format($iva, 2) }}</p>
            <p class="total-final"><strong>Total:</strong> ${{ number_format($order->total, 2) }}</p>
        </div>

    </div>

    <!-- FOOTER -->
    <div class="footer">
        © {{ date('Y') }} Figurarte — Documento fiscal simplificado.  
        Esta factura no requiere sello digital.
    </div>

</body>
</html>
