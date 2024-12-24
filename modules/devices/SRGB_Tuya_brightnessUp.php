<?php
/*
Увеличить яркость.(array('value'=>1--100)). Без  параметров +10.
*/

$brightness = $this->getProperty('brightness');
$inc;

if (isset($params['value']) && $params['value'] > 0 && $params['value'] <= 100) {
  $inc = $params['value'];
} else {
  $inc = '10';
}

$brightness += $inc;

if ($brightness > 100) {
  $brightness = 100;
}

if ($brightness == $this->getProperty('brightness')) {
  return;
}

$this->callMethod('setBrightness', array('value' => $brightness));
