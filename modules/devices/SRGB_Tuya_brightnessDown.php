<?php
/*
Уменьшить яркость на (array("value"=>1--100)). Без  параметров на 10.
*/

$inc;
$brightness = $this->getProperty('brightness');

if (isset($params['value']) && is_numeric($params['value'])) {
  $inc = $params['value'];
  if ($inc < 1) $inc = 1;
  if ($inc > 100) $inc = 100;
  $inc *= -1;
}else {
  $inc = -10;
}

$brightness += $inc;

if ($brightness < 0) {
  $brightness = 0;
}

$this->callMethod('setBrightness', array('value' => $brightness));