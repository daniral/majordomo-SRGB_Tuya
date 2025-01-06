<?php
/*
Установиь brightness в (array("value"=> 0--100))
*/
$newValue;

if (isset($params['value']) && is_numeric($params['value'])) {
    if ($params['value'] < 0) $newValue = 0;
    if ($params['value'] > 100) $newValue = 100;
    if ($newValue > 0) $this->setProperty('flag', 1);
    $this->setProperty('brightness', $newValue);
} else {
    return;
}
