<?php

namespace Tests\Unit;

use AcmeWidgetCo\Offer;
use PHPUnit\Framework\TestCase;

class OfferTest extends TestCase
{
    public function testApplyOffer()
    {
        $offer = new Offer();

        // Test with no red widgets
        $basketItems = [
            ['code' => 'G01', 'price' => 24.95],
            ['code' => 'B01', 'price' => 7.95],
        ];
        $result = $offer->applyOffer($basketItems);
        $this->assertEquals($basketItems, $result); // No change expected

        // Test with one red widget
        $basketItems = [
            ['code' => 'R01', 'price' => 32.95],
        ];
        $result = $offer->applyOffer($basketItems);
        $this->assertEquals($basketItems, $result); // No change expected

        // Test with two red widgets
        $basketItems = [
            ['code' => 'R01', 'price' => 32.95],
            ['code' => 'R01', 'price' => 32.95],
        ];
        $result = $offer->applyOffer($basketItems);
        $this->assertEquals(
            [
                ['code' => 'R01', 'price' => 32.95],
                ['code' => 'R01', 'price' => 16.475],
            ],
            $result
        );
    }
}
