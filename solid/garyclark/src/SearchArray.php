<?php

declare(strict_types=1);

namespace Ibou\App;

class SearchArray
{
  public const PRODUCTS =
  [
    [
      'name' => 'Macbook',
      'type' => 'Laptop',
      'barcode' => 123456,
    ],
    [
      'name' => 'Framework',
      'type' => 'Laptop',
      'barcode' => 789012,
    ],
    [
      'name' => 'Samsung',
      'type' => 'Phone',
      'barcode' => 135791,
    ],
    [
      'name' => 'Iphone',
      'type' => 'Phone',
      'barcode' => 246810,
    ],
  ];

  public function search(string $name): mixed
  {
     /* return array_values(array_filter(array: static::PRODUCTS, 
        callback: fn($product) => $product['name'] === $name 
     ));
     */
    $find = array_find(
      array: static::PRODUCTS, 
        callback: fn(array $product): bool => $product['name'] === $name 
     );

     $findKey = array_find_key(
      array: static::PRODUCTS, 
        callback: fn(array $product): bool => $product['name'] === $name 
     );

    $anyProductsAreLaptops = array_any(
      array: static::PRODUCTS,
      callback: fn(array $product): bool => $product['type'] === 'Laptop',
    );

     return $anyProductsAreLaptops;

 
  }
}