<?php

declare(strict_types=1);

namespace Tests;

use App\Cart;
use PHPUnit\Framework\TestCase;
use TypeError;

class CartTest extends TestCase
{

  public function setUp(): void
  {
    Cart::$tax = 1.2;
  }
  public function testCorrectNetPriceIsReturned(): void
  {
    $cart = new Cart();
    $cart->price = 10;
    $netPrice = $cart->getNetPrice();

    $this->assertEquals(12, $netPrice);
  }

  public function testTheCartTaxValueCanBeChangedStatically(): void
  {
    Cart::$tax = 1.5;
    $cart = new Cart();
    $cart->price = 10;

    $this->assertEquals(15, $cart->getNetPrice());
  }

  public function testWrongTypeThrowsAnError(): void
  {
    $cart = new Cart();
    $cart->price = 10;
    $this->expectException(TypeError::class);
    $this->expectExceptionMessage('must be of type int|float');

    $cart->addToPrice('ten');
  }
}
