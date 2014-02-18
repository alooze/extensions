<?php
/**
 * combobox.hook.php
 * Хук-функция для обработки плейсхолдеров в поле combobox внешней админки
 *
 * Задача - заполнить плейсхолдер [+data+] опциями списка select
 * Данные для списка должны быть в конфиге в виде 
 * "list": {"value":"parent", "text": "category"} (не реализовано!)
 *
 * либо
 * "list": "@SNIPPET НАЗВАНИЕ СНИППЕТА"
 *
 * либо
 * "list": "@SELECT id,category FROM TABLE_NAME WHERE CONDITION"
 *
 * @param $hookName - Название события (OnBeforeXadminInputTemplateRender)
 * @param $params - Массив с данными из конфига 
 * @param &$ret - ссылка на массив с плейсхолдерами
 */
global $modx;
if (!isset($params['list'])) return $ret;

if (is_array($params['list'])) {
    //пока пропускаем
    $ret['data'] = '<option value="">ДАННЫЙ СПОСОБ КОНФИГУРИРОВАНИЯ НЕ РЕАЛИЗОВАН</option>';
    return $ret;
} else {
    $ret['data'] = '';
}

if (substr($params['list'], 0, 7) == '@SELECT') {
    // пока не умничаем с AR, а просто делаем запрос
    $q = substr($params['list'], 8);
    $arr = explode(",", $q);
    foreach ($arr as $key => $value) {
        $flds = explode(":", $value);
        $ret['data'].= '<option value="'.$flds[0].'">'.$flds[1].'</option>';
    }
    /*
    $flds = substr($q, 0, strpos($q, ' '));
    $fldsAr = explode(',', $flds);
    $res = $modx->db->query('SELECT '.$q);
    while ($row = $modx->db->getRow($res)) {
        $ret['data'].= '<option value="'.$row[$fldsAr[0]].'">'.$row[$fldsAr[1]].'</option>';
    }
    */
    return $ret;
}