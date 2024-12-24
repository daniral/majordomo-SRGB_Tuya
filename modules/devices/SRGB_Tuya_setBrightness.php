<?php
/*
Установиь brightness в (array("brightness"=> 0--100))
*/

if (!isset($params['brightness']) || !is_numeric($params['brightness']) || $params['brightness'] < 0 || $params['brightness'] > 100) return;
if ($params['brightness'] > 0) {
    $this->setProperty('flag', 1);
} else {
    $this->callMethod('turnOff');
    return;
    //$this->setProperty('flag', 0);
    //$this->setProperty('illuminanceFlag', 0);
}
$this->setProperty('brightness', $params['brightness']);
