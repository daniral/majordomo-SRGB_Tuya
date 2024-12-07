<?php
/*
Установиь цвет в (array("сщдщк"=> '#------'))
вместо '#------' можно отправлять пресеты
    'red'
    'green'
    'blue'
    'white'
*/
if (!$params['color']) return;

$color = strtolower($params['color']);
$color = preg_replace('/^#/', '', $color);

$transform = array(
    'red' => 'ff0000',
    'green' => '00ff00',
    'blue' => '0000ff',
    'white' => 'ffffff'
);

if (isset($transform[$color])) {
    $color = $transform[$color];
}

$this->setProperty('color', $color);

