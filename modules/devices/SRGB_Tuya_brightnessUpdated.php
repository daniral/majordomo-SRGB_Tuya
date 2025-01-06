<?php
/*
Переводит проценты (0 <--> 100) в рабочие еденицы яркости в пределах (brightnessWorkMin <--> brightnessWorkMax)
Сохраняет предыдущее значение уровня в brightnessSaved
*/

$brightnessLevelNew = $params['NEW_VALUE'];
$brightnessWorkMin = $this->getProperty('brightnessWorkMin');
$brightnessWorkMax = $this->getProperty('brightnessWorkMax');

if ($brightnessLevelNew < 0 || $brightnessLevelNew > 100) {
	return;
}else{
	if ($brightnessWorkMin != $brightnessWorkMax) {
		$brightLevelWork = round($brightnessWorkMin + round(($brightnessWorkMax - $brightnessWorkMin) * $brightnessLevelNew / 100));
		if($brightLevelWork > 0) {
			$this->setProperty('brightnessWork', $brightLevelWork);
			if ($brightnessLevelNew > 0 && $this->getProperty('flag')) {
				$this->setProperty('brightnessSaved', $brightnessLevelNew);
			}
		}else {
		    $this->callMethod('turnOff');
		}
	}
}
