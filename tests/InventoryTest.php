<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class InventoryTest extends TestCase
{

  public function testProductsAreReturned(): void
  {
    $productRepoMock = $this->createMock(\App\ProductRepository::class);

    $inventory = new \App\Inventory($productRepoMock);

    $mockProductsArray = [
      ['id' => 1, 'name' => 'Acme Radio Knobs'],
      ['id' => 2, 'name' => 'Apple iPhone'],
    ];

    $productRepoMock
      ->expects($this->once())
      ->method('fetchProducts')
      ->willReturn($mockProductsArray);

    $inventory->addProducts();

    $this->assertCount(2, $inventory->getProducts());
  }
}
