<?php

namespace Tests\Integration;

use AcmeWidgetCo\Basket;
use AcmeWidgetCo\ProductCatalog;
use AcmeWidgetCo\DeliveryRule;
use AcmeWidgetCo\Offer;
use PHPUnit\Framework\TestCase;

class BasketIntegrationTest extends TestCase
{
    public function testBasketWithMultipleProducts()
    {
        $productCatalog = new ProductCatalog();
        $deliveryRule = new DeliveryRule();
        $offer = new Offer();

        $basket = new Basket($productCatalog, $deliveryRule, $offer);

        $basket->add('B01'); // Blue Widget: $7.95
        $basket->add('G01'); // Green Widget: $24.95

        $this->assertEquals(37.85, $basket->getTotal());
    }
}
