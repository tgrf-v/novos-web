<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\Snap;
use Midtrans\Notification;
use Midtrans\Transaction;

class MidtransService
{
    public function __construct()
    {
        $serverKey = config('midtrans.server_key');
        if (empty($serverKey)) {
            throw new \RuntimeException('Midtrans server key is not configured.');
        }

        Config::$serverKey = $serverKey;
        Config::$isProduction = config('midtrans.is_production', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function createSnapToken(array $params): string
    {
        $snap = Snap::createTransaction($params);

        if (!isset($snap->token)) {
            throw new \RuntimeException('Failed to create Midtrans Snap token.');
        }

        return $snap->token;
    }

    public function handleNotification(): Notification
    {
        return new Notification();
    }

    public function checkTransactionStatus(string $orderId): object
    {
        $status = Transaction::status($orderId);

        if (!$status) {
            throw new \RuntimeException("Failed to check transaction status for: {$orderId}");
        }

        return $status;
    }
}
