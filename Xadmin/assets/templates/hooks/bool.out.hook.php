<?php
/**
 * bool.out.hook.php
 * Хук-функция для доработки вывода ячейки в таблице внешней админки
 *
 * Задача - показать по значению чекбокса либо "да", либо "нет"
 *
 * @param $hookName - Название события (OnBeforeXadminInputTemplateRender)
 * @param $params - Массив с данными из конфига 
 * @param &$ret - ссылка на массив с плейсхолдерами
 */

// global $modx;
if (!isset($params['view'])) return $ret;
