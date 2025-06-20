<?php
// Notifikasi dari Midtrans
$notif = json_decode(file_get_contents("php://input"), true);

// Untuk debug
file_put_contents("log.txt", json_encode($notif, JSON_PRETTY_PRINT));

// Cek transaksi
$order_id = $notif['order_id'] ?? 'UNKNOWN';
$status = $notif['transaction_status'] ?? 'UNKNOWN';

if ($status === 'settlement') {
    // Update database kamu di sini
    file_put_contents("log.txt", "Order $order_id berhasil\n", FILE_APPEND);
} else {
    file_put_contents("log.txt", "Order $order_id status: $status\n", FILE_APPEND);
}

http_response_code(200);
echo "OK";
?>
