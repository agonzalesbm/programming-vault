<?php

require __DIR__ . '/vendor/autoload.php';

use App\ComponentsSet;
use App\Components\Cpu;
use App\Components\Ram;

$cpu = new Cpu("Inte Core I7", 320.00, 12, 4.9);
$ram = new Ram("Corsair vengeance", 120.00, 32);

$myPc = new ComponentsSet("My Pc");
$myPc->addComponent($cpu);
$myPc->addComponent($ram);

echo $myPc->getCompleteDescription();
