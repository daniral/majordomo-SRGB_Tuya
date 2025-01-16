<?php
/*
Установиь brightness в (array("value"=> 0--100))
*/
if (isset($params['value']) && is_numeric($params['value'])) {
	$newValue=$params['value'];
} else {
    return;
}
if ($newValue < 0) $newValue = 0;
if ($newValue > 100) $newValue = 100;
if ($newValue > 0) $this->setProperty('flag', 1);
$this->setProperty('brightness', $newValue);
