<?php
/*
Установиь brightness в (array("brightness"=> 0--100))
*/
if (!isset($params['value']) || !is_numeric($params['value']) || $params['value'] < 0 || $params['value'] > 100) return;
if ($params['value'] > 0) {
    $this->setProperty('flag', 1);
} else {
    $this->callMethod('turnOff');
    return;
}
$this->setProperty('brightness', $params['value']);
