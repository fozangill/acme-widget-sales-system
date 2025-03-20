<?php

require_once __DIR__ . '/vendor/autoload.php';

use AcmeWidgetCo\Basket;
use AcmeWidgetCo\ProductCatalog;
use AcmeWidgetCo\DeliveryRule;
use AcmeWidgetCo\Offer;

$productCatalog = new ProductCatalog();
$deliveryRule = new DeliveryRule();
$offer = new Offer();

$basket = new Basket($productCatalog, $deliveryRule, $offer);

$basket->add('B01'); // $7.95
$basket->add('B01'); // $7.95
$basket->add('R01'); // $32.95
$basket->add('R01'); // $32.95
$basket->add('R01'); // $32.95

echo "Total: $" . number_format($basket->getTotal(), 2); // 98.28