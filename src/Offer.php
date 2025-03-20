<?php

namespace AcmeWidgetCo;

class Offer
{
    public function applyOffer(array $basketItems): array
    {
        $redWidgetCount = 0;

        foreach ($basketItems as &$item) {
            if ($item['code'] === 'R01') {
                $redWidgetCount++;
                if ($redWidgetCount % 2 === 0) {
                    // Apply half-price discount to every second "Red Widget"
                    $item['price'] /= 2;
                }
            }
        }

        return $basketItems;
    }
}
