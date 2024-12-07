<?php

/*
Запускается при смене свойства color.
Проверяет если есть в начале # то отрезает и пишет в color без него.
Сохраняет значение в colorSaved.
Формирует json и пишет в colorWork.
*/

$colorNew = strtolower($params['NEW_VALUE']);
$colorOld = strtolower($params['OLD_VALUE']);
$brightnessSaved = $this->getProperty('brightnessSaved');


if (strncmp($colorNew, '#', 1) == 0) {
    $colorNew = preg_replace('/^#/', '', $colorNew);
    $this->setProperty('color', $colorNew);
}

$colorOld = preg_replace('/^#/', '', $colorOld);

if ($colorNew == $colorOld) return;

if ($this->getProperty('flag')) {
	$this->setProperty('colorSaved', $colorNew);
}

$colorWork = '{"hex":"#' . $colorNew . '"}';
$this->setProperty('colorWork', $colorWork);

//if (!$this->getProperty('status')) {
//	$this->callMethod('turnOn');
//}