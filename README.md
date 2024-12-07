# **Ледлампа(RGB) с управлением яркостью и цветом.**
## **Простое устройство для MajorDomo.**  
Добавление в MajorDomo простого устройства для Ледлампа(RGB) с управлением яркостью и цветом.   
С режимом включеня по датчику освещения, восходу/закату солнца или по установленному времени.  
Автовыключение по заданному времени.С заданными яркостью и цветом для дня и ночи.  
Включение по времени суток(Ночь,День,Кгуглосуточно)

**Надо привязать свойства:**

- **brightnessWork - brightness лампочки.**
  - Добавить Путь (write): zigbee2mqtt/Название устройства/set/brightness
- **colorWork - color лампочки.**
  - Добавить Путь (write): zigbee2mqtt/Название устройства/set/color
- **status - state лампочки.**
  - В статус не добовляем путь(write) так как он нужен только для обратной связи
    что бы знать включена или нет лапочка для сцен или кнопок.
- **Установить минимальные и максимальные рабочие уровни для яркости:**
  - Например для лампочек Xiaomi ZigBee это:
   - brightnessWorkMax - 254
   - brightnessWorkMin - 0

### **ОБЫЧНЫЙ РЕЖИМ:**

Включить - callMethod('имя объекта '.'turnOn');  
Если без параметров установит то что в brightnessSaved и colorSeved.  
Если brightnessSaved и colorSeved пусто то на полную яркость(100%) и белый цвет(#FFFFFF).  

С параметрами:
- callMethod('имя объекта.turnOn', array('brightness'=> 1<-->100, 'color'=> '#------');  
- callMethod('имя объекта.turnOn', array('brightness'=> 1<-->100));  
- callMethod('имя объекта.turnOn', array('color'=> '#------');  

**Устанавливается flag=1. Стопер который не дает запускаться методу AutoOFF.**

### **РЕЖИМ ПОДСВЕТКИ:**

Включить ночной режим - callMethod('имя объекта.turnOn', array('dayNight'=>1));  
- Включится на время которое указано в timerOFF(сек). Если 0 то включится но сам не выключится.  
- Если в presence(например данные с датчика присутствия) 1 то не выключится.  
  - Как только в presence изменися с 1 на 0 запустится метод автовыключения(AutoOFF).    
- Можно включать режим подсветки Днем,Ночью или весь день.  
  - если в workInDai:   
    + 0-Весь день.(Ночью ночные установки яркости и теплоты. Днем дневные.)  
    + 1-Днем  
    + 2-Ночью  
- Включать по солнцу(bySunTime):  
  - после захода - ночные установки яркости (nightBrightness) и цвета (nightColor).  
  - после восхода - дневные (dayBrightness, dayColor).  
  - Надо обязательно писать в свойства sunriseTime и sunsetTime время восхода и заката.  
    Если не указано, то то, что указано - в ручную(byManually).  
  - К восходу и закату можно прибавить или отнять время если надо чтобы включалось или выключалось раньше или позже:
    - addTimeSunrise - к рассвету в формате 05:30 (5 часов 30 минут)
      - signSunrise:  0 - отнять 1 - прибавить.
    - addTimeSunset  - к закату в формате 00:30 (30 минут)
      - signSunset:  0 - отнять 1 - прибавить.  
- Включать вручную(byManually):  
    - после начало ночь - ночные установки яркости и теплоты.  
    - после начло день - дневные.  
- Включать по датчику(bySensor):  
    - Только ночные установки яркости и теплоты.  
      (Если надо можно дописать разные установки для дня и ночи.)  
    - В свойство illuminance надо писать данные с датчика освещения.  
      - если illuminance меньше чем установленно в illuminanceMax подсветка включится.  
    - ***Работу по датчику освещения не проверял так как не имеется в наличии.***  
- **Можно запустить режим подсветки с параметпами:**
  - callMethod('имя объекта.turnOn', array('dayNight'=>1, 'brightness'=> 1<--> 100,'color'=> '#------'));


**Устанавливается flag=0. Запускается метод AutoOFF.**

## **Методы:**

- **brightnessDown**  
  - Уменьшить яркость.(array("value"=>1-50)). Без  параметров -10.
- **brightnessUp**  
  - Увеличить яркость.(array("value"=>1-50)). Без  параметров 10.
- **byDefault** 
  - Установит параметры по дефолту. Это если что-то пошло не так.  
    (При первом запуске метода turnOn тоже все выставится по дефолту.)
- **CommandsMenu** 
  - Создаст меню данного объекта в "Меню Управления"

При первом запуске метода **turnOn** все нужные свойства для работы метода должны прописаться сами.  
Если нужны другие то можно изменить в ручную в свойствах объекта или запустить метод CommandsMenu.  
Он сам создаст меню в "**Меню Управления**" и там можно все удобно настроить.  
Меню будет называться по имени объекта. При желании можно изменить на любое другое.  

Было проверено на Ледленте [Tuta Zigbee RGB light](https://www.zigbee2mqtt.io/devices/TS0503B.html "zigbee2mqtt.io")  
