<?php

namespace AcmeWidgetCo;

class DeliveryRule {
    public function calculateDeliveryFee(float $totalAmount): float
    {
        if($totalAmount < 50) {
            return 4.95;
        } elseif ($totalAmount < 90) {
            return 2.95;
        } else {
            return 0.00; // Free delivery
        }
    }
}