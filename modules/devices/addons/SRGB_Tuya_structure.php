<?php

if (SETTINGS_SITE_LANGUAGE && file_exists(ROOT . 'languages/SRGB_Tuya_' . SETTINGS_SITE_LANGUAGE . '.php')) {
	include_once(ROOT . 'languages/SRGB_Tuya_' . SETTINGS_SITE_LANGUAGE . '.php');
} else {
	include_once(ROOT . 'languages/SRGB_Tuya_default.php'); //
}

$this->device_types['rgb'] = array(
	'TITLE' => 'Освещение RGB (Tuya)',
	'PARENT_CLASS' => 'SRGB',
	'CLASS' => 'SRGB_Tuya',
	'PROPERTIES' => array(
		'addTimeSunrise' => array('DESCRIPTION' => 'Добавить к восходу(00:00)'),
		'addTimeSunset' => array('DESCRIPTION' => 'Добавить к закату(00:00)'),
		'signSunrise' => array('DESCRIPTION' => 'Прибавить/отнять к/от восхода солнца: 1-прибавить, 0-отнять'),
		'signSunset' => array('DESCRIPTION' => 'Прибавить/отнять к/от заката солнца: 1-прибавить, 0-отнять'),
		'sunriseTime' => array('DESCRIPTION' => 'Время восхода солнца.'),
		'sunsetTime' => array('DESCRIPTION' => 'Время захода солнца.'),
		'autoOnOff' => array('DESCRIPTION' => 'Автовключение: 0-не включать 1-включать'),
		'timerOFF' => array('DESCRIPTION' => 'Задержка перед выключением(сек). 0-не выключать.'),
		'workInDai' => array('DESCRIPTION' => 'работать: 0-24 часа. 1-Днем. 2-Ночью.'),
		'byManually' => array('DESCRIPTION' => 'Включать по заданному времени: 0-Выключить. 1-Включить.', 'ONCHANGE' => 'switchTime'),
		'bySensor' => array('DESCRIPTION' => 'Включать по датчику света: 0-Отключить. 1-Включить.', 'ONCHANGE' => 'switchTime'),
		'bySunTime' => array('DESCRIPTION' => 'Включать по солнцу: 0-Выключить. 1-Включить.', 'ONCHANGE' => 'switchTime'),
		'dayBegin' => array('DESCRIPTION' => 'Начало режима день (hh:mm)'),
		'nightBegin' => array('DESCRIPTION' => 'Начало режима ночь (hh:mm)'),
		'presence' => array('DESCRIPTION' => 'Данные с датчика присутствия', 'ONCHANGE' => 'presenceUpdated', 'DATA_KEY' => 1),
		'flag' => array('DESCRIPTION' => 'Стопер для автовыключения'),
		'illuminanceFlag' => array('DESCRIPTION' => 'Стопер датчика освещения'),
		'illuminance' => array('DESCRIPTION' => 'Данные с датчика освещения.', 'DATA_KEY' => 1),
		'illuminanceMax' => array('DESCRIPTION' => 'Максимальное освещение.Если меньше включается свет.'),

		'dayBrightness' => array('DESCRIPTION' => 'Уровень яркости днем (1<-->100)'),
		'dayColor' => array('DESCRIPTION' => 'Цвет днем(HEX)'),
		'nightBrightness' => array('DESCRIPTION' => 'Уровень яркости ночью(1<-->100)'),
		'nightColor' => array('DESCRIPTION' => 'Цвет ночью(HEX)'),

		'brightness' => array('DESCRIPTION' => 'Яркость (0<-->100)', 'ONCHANGE' => 'brightnessUpdated', 'DATA_KEY' => 1),
		'color' => array('DESCRIPTION' => 'Цвет(HEX)', 'ONCHANGE' => 'colorUpdated', 'DATA_KEY' => 1),
		'brightnessWork' => array('DESCRIPTION' => 'Рабочая яркость. Привязать к яркости ледлампы'),
		'colorWork' => array('DESCRIPTION' => 'Рабочий цвет. Привязать к цвету ледлампы'),

		'brightnessSaved' => array('DESCRIPTION' => 'Сохраненная(предыдущая) яркость.', '_CONFIG_TYPE' => 'num'),
		'colorSaved' => array('DESCRIPTION' => 'Сохраненный(предыдущий) цвет.', '_CONFIG_TYPE' => 'num'),
		'brightnessWorkMax' => array('DESCRIPTION' => 'Максимальная рабочая яркость.', '_CONFIG_TYPE' => 'num'),
		'brightnessWorkMin' => array('DESCRIPTION' => 'Минимальная рабочая яркость.', '_CONFIG_TYPE' => 'num'),

	),
	'METHODS' => array(
		'AutoOFF' => array('DESCRIPTION' => 'Автовыключение (timerOFF) 0 не включает.'),
		'brightnessDown' => array('DESCRIPTION' => 'Уменьшить уровень яркости.', '_CONFIG_SHOW' => 1, '_CONFIG_REQ_VALUE' => 1),
		'brightnessUp' => array('DESCRIPTION' => 'Увеличить уровень яркости.', '_CONFIG_SHOW' => 1, '_CONFIG_REQ_VALUE' => 1),
		'byDefault' => array('DESCRIPTION' => 'Установить свойства по умолчанию.'),
		'CommandsMenu' => array('DESCRIPTION' => 'Создает меню управления.', '_CONFIG_SHOW' => 1),
		'presenceUpdated' => array('DESCRIPTION' => 'Запускается при изменении свойства presence'),
		'switchTime' => array('DESCRIPTION' => 'Переключение между по солнцу/вручную/сенсору.'),
		'turnOn' => array('DESCRIPTION' => 'Включить', '_CONFIG_SHOW' => 1),
		'turnOff' => array('DESCRIPTION' => 'Выключить', '_CONFIG_SHOW' => 1),
		'switch' => array('DESCRIPTION' => 'Переключить', '_CONFIG_SHOW' => 1),
		'brightnessUpdated' => array('DESCRIPTION' => 'Запускается при смене яркости'),
		'colorUpdated' => array('DESCRIPTION' => 'Запускается при смене цвета'),
		'setColor' => array('DESCRIPTION' => 'Установиьт цвет(HEX).', '_CONFIG_SHOW' => 1, '_CONFIG_REQ_VALUE' => 1),
		'setBrightness' => array('DESCRIPTION' => 'Установиьт яркость (0<-->100).', '_CONFIG_SHOW' => 1, '_CONFIG_REQ_VALUE' => 1),
	),
);
