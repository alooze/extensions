<?php
/**
 * OnBeforeXadminRowTemplateRender.inc.php
 * Хук-функция для обработки плейсхолдеров в ячейках таблицы
 *
 * Задача - подключить соответствующий файл, если он будет найден
 *
 * @param $hookName - Название события (OnBeforeXadminInputTemplateRender)
 * @param $params - Массив с данными из конфига 
 * @param &$ret - ссылка на массив с плейсхолдерами
 */

// путь к файлам assets/extensions/Xadmin/assets/templates/hooks/combobox.hook.php

$inputName = $params['output'];
$fileName = $this->_baseDir.'assets/templates/hooks/'.$inputName.'.out.hook.php';

if (file_exists($fileName)) {
    return include $fileName;
} else {
    return $ret;
}