<?php
/*
Установиь brightness в (array("brightness"=> 0--100))
*/

if (!$params['brightness'] || !is_numeric($params['brightness'])) return;

$brightness = $params['brightness'];

if ($brightness >= 0 || $brightness <= 100) {
    $this->setProperty('brightness', $brightness);
}
