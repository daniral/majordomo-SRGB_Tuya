<?php
/*
Установиь цвет в (array("color"=> '#------'))
вместо '#------' можно отправлять пресеты
    'red'
    'green'
    'blue'
    'white'
*/

if (!isset($params['color'])) return;
$this->setProperty('flag', 1);
$color = strtolower($params['color']);
$color = preg_replace('/^#/', '', $color);
$this->setProperty('color', $color);

