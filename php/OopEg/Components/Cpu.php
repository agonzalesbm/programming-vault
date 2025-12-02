<?php

namespace App\Components;

use App\Components\Component;

class Cpu extends Component
{
  private int $coresnumber;
  private float $clockghzspeed;

  public function __construct(string $name, float $price, int $coresnumber, float $clockghzspeed)
  {
    parent::__construct($name, $price);
    $this->coresnumber = $coresnumber;
    $this->clockghzspeed = $clockghzspeed;
  }

  public function calculateFinalPrice(): float
  {
    return $this->price * 1.10;
  }

  public function getCompleteDescription(): string
  {
    return "cpu: {$this->name} (cores: {$this->coresnumber}, ghz: {$this->clockghzspeed})";
  }
}
