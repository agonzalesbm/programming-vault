<?php

namespace App\Components;

use App\Components\Component;

class Ram extends Component
{
  private int $capacityGb;

  public function __construct(string $name, float $price, int $capacityGb)
  {
    parent::__construct($name, $price);
    $this->capacityGb = $capacityGb;
  }

  public function calculateFinalPrice(): float
  {
    return $this->price * 1.10;
  }

  public function getCompleteDescription(): string
  {
    return "Ram: {$this->name}, Capacity GB: {$this->capacityGb}";
  }
}
