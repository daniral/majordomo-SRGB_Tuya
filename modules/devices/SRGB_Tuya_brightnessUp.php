<?php
/*
Увеличить яркость.(array('value'=>1--100)). Без  параметров +10.
*/

$brightness = $this->getProperty('brightness');
$inc;

if (isset($params['value']) && is_numeric($params['value'])) {
  $inc = $params['value'];
  if ($inc < 1) $inc *= -1;
  if ($inc > 100) $inc = 100;
}else {
  $inc = 10;
}

$brightness += $inc;

if ($brightness > 100) {
  $brightness = 100;
}

$this->callMethod('setBrightness', array('value' => $brightness));
