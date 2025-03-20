<?php

namespace Tests\Unit;

use AcmeWidgetCo\ProductCatalog;
use PHPUnit\Framework\TestCase;

class ProductCatalogTest extends TestCase
{
    public function testGetProduct()
    {
        $productCatalog = new ProductCatalog();

        // Test retrieving an existing product
        $product = $productCatalog->getProduct('R01');
        $this->assertEquals(['name' => 'Red Widget', 'price' => 32.95], $product);

        // Test retrieving a non-existent product
        $product = $productCatalog->getProduct('INVALID_CODE');
        $this->assertNull($product);
    }
}