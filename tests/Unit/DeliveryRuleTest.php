<?php

namespace Tests\Unit;

use AcmeWidgetCo\DeliveryRule;
use PHPUnit\Framework\TestCase;

class DeliveryRuleTest extends TestCase
{
    public function testCalculateDeliveryFee()
    {
        $deliveryRule = new DeliveryRule();

        // Test orders under $50
        $this->assertEquals(4.95, $deliveryRule->calculateDeliveryFee(49.99));

        // Test orders between $50 and $90
        $this->assertEquals(2.95, $deliveryRule->calculateDeliveryFee(70.00));

        // Test orders of $90 or more
        $this->assertEquals(0.00, $deliveryRule->calculateDeliveryFee(90.00));
        $this->assertEquals(0.00, $deliveryRule->calculateDeliveryFee(100.00));
    }
}