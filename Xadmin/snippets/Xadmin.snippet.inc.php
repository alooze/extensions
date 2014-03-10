<?php
use Modx\Ext\Xadmin\Xadmin;
use Modx\Ext\Xparser\Xparser;

$adm = new Xadmin();

//получаем параметры вызова

$config = isset($config) ? $config : ''; //данные по таблице в БД
$rowTpl = isset($rowTpl) ? $rowTpl : '@FILE '.MODX_BASE_PATH.'assets/extensions/Xadmin/assets/templates/row.xadmin.php'; //одна строка в заголовке таблицы
$searchRowTpl = isset($searchRowTpl) ? $searchRowTpl : '@FILE '.MODX_BASE_PATH.'assets/extensions/Xadmin/assets/templates/searchrow.xadmin.php'; // один поле поиска
$outerTpl = isset($outerTpl) ? $outerTpl : '@FILE '.MODX_BASE_PATH.'assets/extensions/Xadmin/assets/templates/outer.xadmin.php'; //обертка таблицы
$formOuterTpl = isset($formOuterTpl) ? $formOuterTpl : '@FILE '.MODX_BASE_PATH.'assets/extensions/Xadmin/assets/templates/formouter.xadmin.php'; //шаблон обертки формы редактирования/добавления 
$formRowTpl = isset($formRowTpl) ? $formRowTpl : '@FILE '.MODX_BASE_PATH.'assets/extensions/Xadmin/assets/templates/formrow.xadmin.php'; //одно поле в форме добавления/редактирования

if ($config != '') {
    
    /**
     * @Todo: эти переменные позже можно будет убрать, это демка
     */
    $ext = $adm->getExtName();
    $ver = $adm->getExtVersion();

    /**
     * Пытаемся загрузить указанную конфигурацию
     */
    $do = $adm->loadConfig($config);

    if (!$do) {
        return $adm->lang('Bad extension config');
    } else if (!is_array($adm->config)) {
        return $adm->lang('Broken extension config');
    } else {
        /**
         * Получаем имя класса-модели
         */
        $_ARM = $adm->getArModel();
        
        /**
         * Основная логика работы
         * Определяем, требуется таблица или форма редактирования
         */
        if (!isset($_REQUEST['action'])) {
            $action = 'list';
        } else {
            $action = $_REQUEST['action'];
        }

        /**
         * Запуск нужного режима работы
         */
        switch ($action) {
            case 'list':
                /**
                 * Основной режим, вывод таблицы на easyUI
                 * Все данные для вывода должны быть в конфиг-файле
                 * Если чего-то не будет хватать, добавлять синтаксис в конфиг
                 */

                // Подключаем необходимые скрипты
                include_once dirname(dirname(__FILE__)).'/lib/template.header.php';
                
                // свойства шапки из конфига
                $ph = $adm->config['grid'][0];
                if (!is_array($ph)) {
                    return $adm->lang('Broken extension config');
                }

                //готовим место под ячейки в шапке таблицы
                $ph['inner'] = '';
                $row = new Xparser();
                //чтобы каждый раз в цикле не дергать файлы/чанки, установим шаблон тут
                $row->strToTpl($rowTpl);

                //готовим место для полей в форме редактирования
                // $phf['finner'] = '';
                // $fRow = new Xparser();
                // //чтобы каждый раз в цикле не дергать файлы/чанки, установим шаблон тут
                // $fRow->strToTpl($formRowTpl);

                //заполняем URL страницы с формой
                $ph['url'] = $modx->makeUrl($modx->documentIdentifier);

                /**
                 * Формируем шапку таблицы
                 */

                // получаем данные по колонкам
                $cols = $adm->config['fields'][0];
                if (!is_array($cols)) {
                    return $adm->lang('Broken extension config');
                }

                foreach ($cols as $key => $data) {
                    // print_r($data);
                    $data['field'] = $key;
                        
                    // если в конфиге output стоит в false, не показываем колонку
                    if ($data['output'] != 'false') {                    
                        // Используем хуки
                        //для формирования некоторых полей требуется передать доп. данные
                        $data['ARM'] = $_ARM;

                        // вызываем хук-функцию                        
                        $adm->invokeHook('OnBeforeXadminRowTemplateRender', 
                            $data,
                            $data
                        );
                        $ph['inner'].= $row->setPh($data)
                                            ->parse()
                                            ->get();
                    }

                    // /**
                    //  * Готовим форму редактирования
                    //  */
                    // // если в конфиге не задан тип ввода, считаем, что в форме поле не нужно
                    // if (!isset($data['input'])) continue;
                    // // если в конфиге тип ввода false, поле не нужно 
                    // // @Todo: УТОЧНИТЬ ПРЕОБРАЗОВАНИЕ строки в логическую переменную
                    // if ($data['input'] == 'false') continue;

                    // //устанавливаем плейсхолдеры для нужного инпута
                    // $inputType = $data['input'];
                    // $inputFile = MODX_BASE_PATH.'assets/extensions/Xadmin/assets/templates/inputs/'.$inputType.'.input.tpl';

                    // if (!is_file($inputFile)) {
                    //     return $adm->lang('Bad input template').': '.$inputType;
                    // }

                    // // Для некоторых видов инпутов требуется доработка
                    // // Используем хуки

                    // //для формирования некоторых полей требуется передать доп. данные
                    // $data['ARM'] = $_ARM;
                    
                    // // вызываем хук-функцию
                    // $adm->invokeHook('OnBeforeXadminInputTemplateRender', 
                    //     $data,
                    //     $data
                    // );

                    // // print_r($data);

                    // $formInput = new Xparser();
                    // $phh['name'] = $data['name'];
                    // $phh['input'] = $formInput->strToTpl('@FILE '.$inputFile)
                    //                             ->setPh($data)
                    //                             ->parse()
                    //                             ->get();

                    // $phf['finner'].= $fRow->setPh($phh)
                    //                         ->parse()
                    //                         ->get();
                    // unset($phh);
                    // unset($formInput);
                    // unset($inputFile);
                }

                // /**
                //  * Оборачиваем инпуты в шаблон формы
                //  */
                // $form = new Xparser();
                // $formData = $adm->config['form'][0];
                // $phf = array_merge($phf, $formData);
                // $ph['form'] = $form->strToTpl($formOuterTpl)
                //         ->setPh($phf)
                //         ->parse()
                //         ->get();                

                /**
                 * Формируем поля ввода для поиска и строки в функции для поиска
                 */
                if(isset($adm->config['grid'][0]['search']) && trim($adm->config['grid'][0]['search']) != '') {

                    $parseInput = new Xparser(); // fields of search data
                    $parseInput->strToTpl($searchRowTpl);
                    //$parseJs = new Xparser();
                    $ph['searchRowJs'] = ''; // row if js function doSearch()

                    $arr = explode(",", $adm->config['grid'][0]['search']);
                    $sArr = array(); // array of search fields and text
                    foreach ($arr as $key => $value) {
                        $value = explode(":", $value);
                        $sArr['text'] = $value[1];
                        $sArr['field'] = $value[0];
                        $ph['searchData'] .= $parseInput->setPh($sArr)
                                                        ->parse()
                                                        ->get();
                        $ph['searchRowJs'] .= "search_{$value[0]}: \$('#search-".$value[0]."').val(),";
                    }
                    $ph['searchRowJs'] = trim($ph['searchRowJs'], ",");

                }
                
                /**
                 * Оборачиваем форму и шапку таблицы и выводим
                 */
                $outer = new Xparser();
                $outer->strToTpl($outerTpl)
                        ->setPh($ph)
                        ->parse()
                        ->show();
                break;



            /**
             * Отдаем список аяксом в виде json
             */
            case 'data-json':
                $outerTplJson = '@CODE {"total":[+total+],"rows":[ [+inner+] ]}';
                $ph['total'] = 0;

                $phAr = array();
                $row = new Xparser();
                
                $obj = new $_ARM();
                $attr = $obj->attributes(); // поля таблицы
                $conditions = array(); // условия выборки

                /**
                * Обработка реквестов: пагинация, поиск и др.
                */

                //// SEARCH ////
                $condStrSql = '';
                if(isset($adm->config['grid'][0]['search']) && trim($adm->config['grid'][0]['search']) != '') {

                    $sConfArr = array(); // массив полей поиска из конфига; для проверки
                    $searchConf = trim($adm->config['grid'][0]['search']); // category:Category,id:ID
                    $searchConfArr = explode(",", $searchConf);
                    foreach ($searchConfArr as $key => $value) {
                        $value = explode(":", $value);
                        $sConfArr[$value[0]] = '';
                    }

                    foreach ($attr as $field => $value) {
                        $searchData = isset($_POST['search_'.$field]) ? trim($_POST['search_'.$field]) : '';
                        if(trim($searchData) != '' && isset($sConfArr[$field])) {

                            $searchData = trim($searchData);
                            $conditions[] = " " . $field . " LIKE '%{$searchData}%' ";

                        }
                    }

                    
                    if(count($conditions) > 1) {

                        $condStrSql = implode(" AND ", $conditions);

                    } elseif(count($conditions) == 0) {

                        //$condStrSql = $conditions[0];
                        $condStrSql = "";

                    } else {

                        $condStrSql = $conditions[0];

                    }
                    /**/

                }

                // pagination
                $page = isset($_POST['page']) ? intval($_POST['page']) : 1;
                $rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
                $offset = ($page - 1) * $rows;

                /**
                 * получаем из конфига требуемые поля
                 */
                $cols = $adm->config['fields'][0];
                //$condStrSql = "category LIKE '%te%'";
                $items = $_ARM::all(array('conditions' => $condStrSql, 'limit' => $rows, 'offset' => $offset));


                foreach ($items as $item) {
                    
                    /**
                     * метод to_json() к сожалению не прокатит
                     */
                    // $phAr[]= $item->to_json();
                    foreach ($cols as $key => $data) {                        
                        // if($data['output'] == 'false') { continue; }
                        // формируем поля с ссылками, если есть в настройках конфига
                        if ($data['output'] == 'link') {
                            $tmpAr[$key] = '<a href="'.$modx->makeUrl($data['linkhref']).'?id='.$item->id.'">link</a>';                        
                        } else {
                            $tmpAr[$key] = $item->$key;
                        }

                        // этот код пока не удаляем, но его удалось заменить
                        // с помощью delegate в модели
                        // if (isset($data['extend'])) {
                        //     list($attr,$subAttr) = explode(':', $data['extend']);
                        //     $tmpAr[$attr] = $item->$attr->$subAttr;
                        // }
                    }
                    
                    $phAr[] = json_encode($tmpAr);
                    unset($tmpAr);
                    //$ph['total']++;
                }
                $ph['total'] = $_ARM::count();
                $ph['inner'] = implode(',', $phAr);

                $outer = new Xparser();
                $outer->strToTpl($outerTplJson)
                        ->setPh($ph)
                        ->parse()
                        ->show();
                die();
                break;


            /**
             * Добавление строки
             */
            case 'save':
                $obj = new $_ARM();
                $attr = $obj->attributes();
                $dataToInsert = array();
                foreach ($attr as $key => $value) {
                    if(isset($_REQUEST[$key])) {
                        $dataToInsert[$key] = $_REQUEST[$key];
                    } 
                }
                unset($dataToInsert['id']);
                $res = $_ARM::create($dataToInsert);                
                if ($res){
                    $output = json_encode(array('success'=>true));
                } else {
                    $output = json_encode(array('msg'=>'Some errors occured.'));
                }
                unset($res);
                die($output);



            /**
             * Обновление строки
             */
            case 'update':
                $cols = $adm->config['fields'][0];
                $id = intval($_REQUEST['id']);

                $dataToUpdate = array();
                foreach ($cols as $key => $value) {
                    if(isset($_REQUEST[$key])) {
                        $dataToUpdate[$key] = $_REQUEST[$key];
                    }
                }
                unset($dataToUpdate['id']);

                $res = $_ARM::table()->update($dataToUpdate, array('id' => array($id)));
                
                if ($res){
                    $output = json_encode(array('success'=>true));
                } else {
                    $output = json_encode(array('msg'=>'Some errors occured.'));
                }
                unset($res);
                die($output);


            /**
             * Удаление строки
             */
            case 'remove': 
                $id = intval($_REQUEST['id']);
                $res = $_ARM::table()->delete(array('id' => array($id)));                
                if ($res){
                    $output = json_encode(array('success'=>true));
                } else {
                    $output = json_encode(array('msg'=>'Some errors occured.'));
                }
                unset($res);
                die($output);


            /**
             * Подгрузка формы в модальное окно
             */
            case 'form':
                // получаем данные по колонкам
                $cols = $adm->config['fields'][0];
                if (!is_array($cols)) {
                    die($adm->lang('Broken extension config'));
                }

                //готовим место для полей в форме редактирования
                $phf['finner'] = '';
                $fRow = new Xparser();
                //чтобы каждый раз в цикле не дергать файлы/чанки, установим шаблон тут
                $fRow->strToTpl($formRowTpl);

                //заполняем URL страницы с формой
                $ph['url'] = $modx->makeUrl($modx->documentIdentifier);

                //получаем данные по расширенным параметрам
                $params = $adm->config['avs'][0];

                // print_r($cols);
                // die();
                foreach ($cols as $key => $data) {
                    /**
                     * Готовим форму редактирования
                     */
                    // если в конфиге не задан тип ввода, считаем, что в форме поле не нужно
                    if (!isset($data['input'])) continue;
                    // если в конфиге тип ввода false, поле не нужно 
                    // @Todo: УТОЧНИТЬ ПРЕОБРАЗОВАНИЕ строки в логическую переменную
                    if ($data['input'] == 'false') continue;

                    //устанавливаем плейсхолдеры для нужного инпута
                    $inputType = $data['input'];
                    $inputFile = MODX_BASE_PATH.'assets/extensions/Xadmin/assets/templates/inputs/'.$inputType.'.input.tpl';

                    if (!is_file($inputFile)) {
                        return $adm->lang('Bad input template').': '.$inputType;
                    }

                    // Для некоторых видов инпутов требуется доработка
                    // Используем хуки

                    //для формирования некоторых полей требуется передать доп. данные
                    $data['ARM'] = $_ARM;
                    
                    // вызываем хук-функцию
                    $adm->invokeHook('OnBeforeXadminInputTemplateRender', 
                        $data,
                        $data
                    );

                    // print_r($data);

                    $formInput = new Xparser();
                    $data['field'] = $key;
                    $phh['name'] = $data['name'];
                    $phh['input'] = $formInput->strToTpl('@FILE '.$inputFile)
                                                ->setPh($data)
                                                ->parse()
                                                ->get();

                    $phf['finner'].= $fRow->setPh($phh)
                                            ->parse()
                                            ->get();
                    unset($phh);
                    unset($formInput);
                    unset($inputFile);
                }

                /**
                 * Если есть расширенные параметры, добавляем их к форме
                 */
                if (is_array($params)) {
                    //
                }

                /**
                 * Оборачиваем инпуты в шаблон формы
                 */
                $form = new Xparser();
                $formData = $adm->config['form'][0];
                $phf = array_merge($phf, $formData);
                $formCode = $form->strToTpl($formOuterTpl)
                        ->setPh($phf)
                        ->parse()
                        ->get();

                $formCode = preg_replace('~\[\+(.*?)\+\]~', "", $formCode); 

                die($formCode);
                break;

            default:
                //
                break;
        }
    }
} else {
    return $adm->lang('No party without config');
}
return;