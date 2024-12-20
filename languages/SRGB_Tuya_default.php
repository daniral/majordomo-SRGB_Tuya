<?php

$dictionary = array(
 'SRGB_Tuya_PATTERN_BRIGHTNESS' => 'brightness',
);

foreach ($dictionary as $k => $v) {
 if (!defined('LANG_' . $k)) {
  @define('LANG_' . $k, $v);
 }
}