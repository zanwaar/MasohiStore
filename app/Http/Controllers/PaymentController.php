<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function handleNotification(Request $request)
    {
        // Mendapatkan data JSON dari permintaan
        $data = $request->json()->all();
        $serverKey = env('MIDTRANS_SERVER_KEY');
        // Log data yang diterima
        Log::info('Midtrans Notification received', $data);
        
        // Validasi signature key
        $signatureKey = hash('sha512', $data['order_id'] . $data['status_code'] . $data['gross_amount']  . $serverKey);
        if ($signatureKey !== $data['signature_key']) {
            Log::warning('Invalid signature', [
                'expected_signature' => $signatureKey,
                'received_signature' => $data['signature_key'],
            ]);
            return response()->json(['status' => 'invalid signature'], 403);
        }

        // Mengecek apakah data valid
        if (is_array($data) && isset($data['order_id'], $data['transaction_status'])) {
            $orderId = $data['order_id'];
            $transactionStatus = $data['transaction_status'];

            // Menulis data ke file log
            Log::info('Processing transaction status', [
                'order_id' => $orderId,
                'transaction_status' => $transactionStatus,
            ]);

            // Update status transaksi di database
            if ($transactionStatus == 'settlement') {
                $order = Order::find($orderId);
                if ($order) {
                    $order->update([
                        'status' => 'diproses',
                        'payment_status' => 'dibayar',
                    ]);
                    Log::info('Order updated to PAID and processing', ['order_id' => $orderId]);
                    return response()->json(["message" => "Pembayaran telah berhasil"]);
                }
            } elseif ($transactionStatus == 'expire') {
                $order = Order::find($orderId);
                if ($order) {
                    $order->update([
                        'status' => 'expire',
                        'payment_status' => 'expire',
                    ]);
                    Log::info('Order updated to dibatalkan and expire', ['order_id' => $orderId]);
                    return response()->json(["message" => "Transaksi telah kedaluwarsa"]);
                }
            }

            return response()->json(['status' => 'success', 'data' => $data]);
        } else {
            return response()->json(['error' => 'Invalid data'], 400);
        }
    }
}
