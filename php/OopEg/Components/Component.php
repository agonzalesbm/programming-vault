<?php

namespace App\Components;

use App\Interfaces\Descriptible;

abstract class Component implements Descriptible
{
  protected string $name;
  protected float $price;

  public function __construct(string $name, float $price)
  {
    $this->name = $name;
    $this->price = $price;
  }

  public function getName(): string
  {
    return $this->name;
  }

  public function getPrice(): float
  {
    return $this->price;
  }

  abstract public function calculateFinalPrice(): float;
}
