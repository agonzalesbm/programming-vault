<?php

namespace App;

use App\Components\Component;
use App\Interfaces\Descriptible;

class ComponentsSet implements Descriptible
{
  private string $name;
  /*
   * @var Component[]
   */
  private array $components = [];

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  public function addComponent(Component $component): void
  {
    $this->components[] = $component;
  }

  public function calculateTotalPrice(): float
  {
    $totalPrice = 0.0;
    foreach ($this->components as $component) {
      $totalPrice += $component->calculateFinalPrice();
    }
    return $totalPrice;
  }

  public function getCompleteDescription(): string
  {
    $desc = "--- Components set: {$this->name} ---\n";
    foreach ($this->components as $component) {
      $desc .= "- " . $component->getCompleteDescription() . "\n";
    }
    $desc .= "Precio total estimado: $" . number_format($this->calculateTotalPrice(), 2);

    return $desc;
  }
}
