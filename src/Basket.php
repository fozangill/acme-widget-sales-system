<?php

namespace AcmeWidgetCo;

class Basket
{
    private ProductCatalog $productCatalog;
    private DeliveryRule $deliveryRule;
    private Offer $offer;

    private array $items = [];

    public function __construct(
        ProductCatalog $productCatalog,
        DeliveryRule $deliveryRule,
        Offer $offer
    ) {
        $this->productCatalog = $productCatalog;
        $this->deliveryRule = $deliveryRule;
        $this->offer = $offer;
    }

    public function add(string $productCode): void
    {
        $product = $this->productCatalog->getProduct($productCode);
        if ($product) {
            $this->items[] = [
                'code' => $productCode,
                'name' => $product['name'],
                'price' => $product['price'],
            ];
        }
    }

    public function getTotal(): float
    {
        $subtotal = 0.00;
        foreach ($this->items as $item) {
            $subtotal += $item['price'];
        }

        // Apply offers
        $this->items = $this->offer->applyOffer($this->items);

        // Recalculate subtotal after applying offers
        $subtotal = 0.00;
        foreach ($this->items as $item) {
            $subtotal += $item['price'];
        }

        // Calculate delivery fee
        $deliveryFee = $this->deliveryRule->calculateDeliveryFee($subtotal);

        return $subtotal + $deliveryFee;
    }

}
