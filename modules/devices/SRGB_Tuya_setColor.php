<?php
/*
Установиь цвет в (array("color"=> '#------'))
вместо '#------' можно отправлять пресеты
    'red'
    'green'
    'blue'
    'white'
*/
if (!isset($params['color']) && !isset($params['value'])) return;
$this->setProperty('flag', 1);
$color = isset($params['color'])?$params['color']:$params['value'];
$this->setProperty('color', $color);