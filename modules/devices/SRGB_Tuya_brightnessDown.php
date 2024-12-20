<?php
/*
Уменьшить яркость на (array("value"=>1--100)). Без  параметров на 10.
*/

$inc;
$brightness = $this->getProperty('brightness');

if (isset($params[value]) && $params[value] > 0 && $params[value] <= 100) {
  $inc = $params[value];
  if ($inc > 0) {
    $inc = $inc * -1;
  }
} else {
  $inc = '-10';
}

$brightness += $inc;

if ($brightness < 0) {
  $brightness = 0;
}

if ($brightness == $this->getProperty('brightness')) {
  return;
}

$this->callMethod('turnOn', array('brightness' => $brightness));
