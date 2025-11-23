<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;


class PdfController extends Controller
{
    public function ticket($id)
    {
        $order = Order::with('items', 'user')->findOrFail($id);

        $pdf = PDF::loadView('pdf.ticket', compact('order'));

        return $pdf->download("Ticket_Orden_{$order->id}.pdf");
    }

    public function factura($id)
    {
        $order = Order::with('items', 'user')->findOrFail($id);

        $subtotal = $order->total / 1.16;
        $iva = $order->total - $subtotal;

        $data = [
            'order' => $order,
            'subtotal' => $subtotal,
            'iva' => $iva
        ];

        $pdf = PDF::loadView('pdf.factura', $data);

        return $pdf->download("Factura_Orden_{$order->id}.pdf");
    }
}
