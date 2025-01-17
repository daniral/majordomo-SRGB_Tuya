<?php
/*
Запускается при смене свойства color.
Проверяет если есть в начале # то отрезает и пишет в color без него.
Сохраняет значение в colorSaved.
Формирует json и пишет в colorWork.
*/

$color = strtolower($params['NEW_VALUE']);
$color = preg_replace('/^#/', '', $color);
$colorOld = strtolower($params['OLD_VALUE']);
$colorOld = preg_replace('/^#/', '', $colorOld);

$transform = array(
    'red' => 'ff0000',
    'green' => '00ff00',
    'blue' => '0000ff',
    'white' => 'ffffff'
);

if (isset($transform[$color])) {
    $color = $transform[$color];
}

if ($color == $colorOld) {
	return;
}else{
	$this->setProperty('color', $color);
}

if ($this->getProperty('flag')) {
	$this->setProperty('colorSaved', $color);
}

if (!$this->getProperty('brightness')) {
	$this->callMethod('turnOn');
}

$colorWork = '{"hex":"#' . $color . '"}';
$this->setProperty('colorWork', $colorWork);