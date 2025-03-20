<?php

namespace Tests\Unit;

use AcmeWidgetCo\Basket;
use AcmeWidgetCo\ProductCatalog;
use AcmeWidgetCo\DeliveryRule;
use AcmeWidgetCo\Offer;
use PHPUnit\Framework\TestCase;

class BasketTest extends TestCase
{
    public function testAddAndCalculateTotal()
    {
        $productCatalog = new ProductCatalog();
        $deliveryRule = new DeliveryRule();
        $offer = new Offer();

        $basket = new Basket($productCatalog, $deliveryRule, $offer);

        $basket->add('R01'); // Red Widget: $32.95
        $basket->add('G01'); // Green Widget: $24.95

        // Allow for a small tolerance (e.g., 0.0001)
        $this->assertThat(
            $basket->getTotal(),
            $this->logicalAnd(
                $this->greaterThanOrEqual(60.85 - 0.0001),
                $this->lessThanOrEqual(60.85 + 0.0001)
            )
        );
    }

    public function testApplyOffer()
    {
        $productCatalog = new ProductCatalog();
        $deliveryRule = new DeliveryRule();
        $offer = new Offer();

        $basket = new Basket($productCatalog, $deliveryRule, $offer);

        $basket->add('R01'); // Red Widget: $32.95
        $basket->add('R01'); // Red Widget: $32.95 (half price)

        // Allow for a small tolerance (e.g., 0.0001)
        $this->assertThat(
            $basket->getTotal(),
            $this->logicalAnd(
                $this->greaterThanOrEqual(54.375 - 0.0001),
                $this->lessThanOrEqual(54.375 + 0.0001)
            )
        );
    }
}