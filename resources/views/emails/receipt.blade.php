<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recibo de compra</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f4f7; font-family: 'Arial', sans-serif;">
    <table width="100%" cellpadding="0" cellspacing="0" style="background-color:#f4f4f7; padding: 40px 0;">
        <tr>
            <td align="center">
                <table width="600" cellpadding="0" cellspacing="0" style="background:white; border-radius:10px; overflow:hidden; box-shadow:0 2px 8px rgba(0,0,0,0.08);">
                    
                    <!-- Header -->
                    <tr>
                        <td style="background:#111827; color:white; padding:30px 25px; text-align:center;">
                            <h1 style="margin:0; font-size:24px; font-weight:700;">Figurarte</h1>
                            <p style="margin:5px 0 0; font-size:14px; opacity:0.8;">Gracias por tu compra 🎉</p>
                        </td>
                    </tr>

                    <!-- Info del cliente -->
                    <tr>
                        <td style="padding: 25px;">
                            <h2 style="margin:0 0 10px; font-size:20px; color:#111827;">Hola {{ $user->name }},</h2>
                            <p style="margin:0; color:#374151; font-size:15px;">
                                Aquí tienes tu recibo de compra. Guarda este correo para futuras referencias.
                            </p>
                        </td>
                    </tr>

                    <!-- Número de orden -->
                    <tr>
                        <td style="padding: 0 25px 20px;">
                            <div style="
                                background:#eef2ff; 
                                padding:15px 20px; 
                                border-radius:8px; 
                                border-left:4px solid #6366f1;
                            ">
                                <strong style="font-size:15px; color:#4338ca;">Número de orden:</strong>
                                <span style="font-size:15px; color:#1f2937; margin-left:5px;">
                                    #{{ $order->id }}
                                </span>
                                <br>
                                <strong style="font-size:15px; color:#4338ca;">Fecha:</strong>
                                <span style="font-size:15px; color:#1f2937; margin-left:5px;">
                                    {{ $order->created_at->format('d/m/Y') }}
                                </span>
                            </div>
                        </td>
                    </tr>

                    <!-- Tabla de productos -->
                    <tr>
                        <td style="padding: 10px 25px 25px;">
                            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse: collapse;">
                                <thead>
                                    <tr>
                                        <th align="left" style="padding-bottom:10px; border-bottom:2px solid #e5e7eb; color:#374151;">Producto</th>
                                        <th align="center" style="padding-bottom:10px; border-bottom:2px solid #e5e7eb; color:#374151;">Cantidad</th>
                                        <th align="right" style="padding-bottom:10px; border-bottom:2px solid #e5e7eb; color:#374151;">Precio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $item)
                                    <tr>
                                        <td style="padding:15px 0; border-bottom:1px solid #e5e7eb; color:#111827;">
                                            <strong>{{ $item->nombre_producto }}</strong>
                                            <br>
                                            <span style="font-size:13px; color:#6b7280;">ID: {{ $item->product_id }}</span>
                                        </td>

                                        <td align="center" style="padding:15px 0; border-bottom:1px solid #e5e7eb; color:#111827;">
                                            {{ $item->cantidad }}
                                        </td>

                                        <td align="right" style="padding:15px 0; border-bottom:1px solid #e5e7eb; color:#111827;">
                                            ${{ number_format($item->precio_unitario, 2) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </td>
                    </tr>

                    <!-- Total -->
                    <tr>
                        <td style="padding: 0 25px 30px;">
                            <table width="100%">
                                <tr>
                                    <td align="right">
                                        <h2 style="margin:0; font-size:22px; color:#111827;">
                                            Total: ${{ number_format($order->total, 2) }}
                                        </h2>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#f9fafb; padding:20px; text-align:center; color:#6b7280; font-size:13px;">
                            © {{ date('Y') }} Figurarte — Todos los derechos reservados.
                            <br>
                            Este correo es solo un comprobante. No respondas a este mensaje.
                        </td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
</body>
</html>
