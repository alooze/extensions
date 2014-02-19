<?php
/**
 * select.hook.php
 * Хук-функция для обработки плейсхолдеров в поле select внешней админки
 *
 * Задача - заполнить плейсхолдер [+data+] опциями списка select
 * Данные для списка должны быть в конфиге в виде 
 * "list": "val1==name1|val2==name2..."
 *
 * либо
 * "list": "@SNIPPET НАЗВАНИЕ СНИППЕТА" (не реализовано)
 *
 * либо
 * --- "list": "@SELECT id,category FROM TABLE_NAME WHERE CONDITION" (не реализовано)
 * +++ "list": "@SELECT id,category"
 *
 * @param $hookName - Название события (OnBeforeXadminInputTemplateRender)
 * @param $params - Массив с данными из конфига 
 * @param &$ret - ссылка на массив с плейсхолдерами
 */
global $modx;
$_ARM = $params['ARM'];
if (!isset($params['list'])) return $ret;

if (is_array($params['list'])) {
    //пока пропускаем
    $ret['data'] = '<option value="">ДАННЫЙ СПОСОБ КОНФИГУРИРОВАНИЯ НЕ РЕАЛИЗОВАН</option>';
    return $ret;
} else {
    $ret['data'] = '';
}

if (substr($params['list'], 0, 7) == '@SELECT') {
    $q = substr($params['list'], 8);
    $flds = substr($q, 0, strpos($q, ' '));
    list($k, $v) = explode(',', $flds);

    $obj = new $_ARM();

    $res = $obj::find('all');
    foreach ($res as $row) {
        $ret['data'].= '<option value="'.$row->$k.'">'.$row->$v.'</option>';
    }
    // пока не умничаем с AR, а просто делаем запрос
    // $q = substr($params['list'], 8);
    // $arr = explode(",", $q);
    // foreach ($arr as $key => $value) {
    //     $flds = explode(":", $value);
    //     $ret['data'].= '<option value="'.$flds[0].'">'.$flds[1].'</option>';
    // }
    /*
    $flds = substr($q, 0, strpos($q, ' '));
    $fldsAr = explode(',', $flds);
    $res = $modx->db->query('SELECT '.$q);
    while ($row = $modx->db->getRow($res)) {
        $ret['data'].= '<option value="'.$row[$fldsAr[0]].'">'.$row[$fldsAr[1]].'</option>';
    }
    */
    
} else {
    $arr = explode('|', $params['list']);
    foreach ($arr as $row) {
        list($key, $val) = explode('==', $row);
        if (!isset($val) || $val == '') $val = $key;
        $ret['data'].= '<option value="'.$key.'">'.$val.'</option>';
    }
}

return $ret;