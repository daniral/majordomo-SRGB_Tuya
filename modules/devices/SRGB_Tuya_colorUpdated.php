<?php
/*
Запускается при смене свойства color.
Проверяет если есть в начале # то отрезает и пишет в color без него.
Сохраняет значение в colorSaved.
Формирует json и пишет в colorWork.
*/

$color = strtolower($params['NEW_VALUE']);
$colorOld = strtolower($params['OLD_VALUE']);

if (strncmp($color, '#', 1) == 0) {
    $color = preg_replace('/^#/', '', $color);
    $this->setProperty('color', $color);
}

$colorOld = preg_replace('/^#/', '', $colorOld);

$transform = array(
    'red' => 'ff0000',
    'green' => '00ff00',
    'blue' => '0000ff',
    'white' => 'ffffff'
);

if (isset($transform[$color])) {
    $color = $transform[$color];
	$this->setProperty('color', $color);
}

if ($color == $colorOld) return;

if ($this->getProperty('flag')) {
	$this->setProperty('colorSaved', $color);
}

if (!$this->getProperty('brightness')) {
	$this->callMethod('turnOn');
}

$colorWork = '{"hex":"#' . $color . '"}';
$this->setProperty('colorWork', $colorWork);