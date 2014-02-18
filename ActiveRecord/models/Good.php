<?php
namespace Modx\Ext\Xadmin\Models;

use ActiveRecord\Model;

class Good extends Model 
{
    /**
     * Нет способа передавать префикс таблиц в статические атрибуты
     * @Todo: пересмотреть в сторону упрощения
     */
    static $table_name='guns_xa_goods';

    /**
     * Указываем, что данные по родительским категориям находятся тут же
     */
    static $belongs_to = array(
        array('pcat', 'class_name' => 'Category', 'foreign_key'=>'parent')
    );

    /**
     * Указываем, что название родительской категории надо делегировать 
     * атрибуту p_category 
     * т.е.
     * вместо $cat->pcat->category
     * будет использоваться $cat->p_category
     */
    static $delegate = array(
        array('category', 'to' => 'pcat', 'prefix' => 'p')
    );

    // функция генерации алиаса
    public function setAlias ($alias) {
        $iso = array("а"=>"a", "б"=>"b", "в"=>"v", "г"=>"g", "д"=>"d", "е"=>"e",
            "ё"=>"jo", "ж"=>"zh", "з"=>"z", "и"=>"i", "й"=>"jj", "к"=>"k", "л"=>"l",
            "м"=>"m", "н"=>"n", "о"=>"o", "п"=>"p", "р"=>"r", "с"=>"s", "т"=>"t", "у"=>"u",
            "ф"=>"f", "х"=>"kh", "ц"=>"c", "ч"=>"ch", "ш"=>"sh", "щ"=>"shh", "ы"=>"y", "ь"=>"", "ъ"=>"",
            "э"=>"eh", "ю"=>"yu", "я"=>"ya", "А"=>"a", "Б"=>"b", "В"=>"v", "Г"=>"g",
            "Д"=>"d", "Е"=>"e", "Ё"=>"jo", "Ж"=>"zh", "З"=>"z", "И"=>"i", "Й"=>"jj",
            "К"=>"k", "Л"=>"l", "М"=>"m", "Н"=>"n", "О"=>"o", "П"=>"p", "Р"=>"r", "С"=>"s",
            "Т"=>"t", "У"=>"u", "Ф"=>"f", "Х"=>"kh", "Ц"=>"c", "Ч"=>"ch", "Ш"=>"sh",
            "Щ"=>"shh", "Ы"=>"y", "Ь"=>"", "Ъ"=>"", "Э"=>"eh", "Ю"=>"yu", "Я"=>"ya", " "=>"-", "."=>"-",
            ","=>"-", "_"=>"-", "+"=>"", ":"=>"", ";"=>"", "!"=>"", "?"=>"", "/"=>"", "\\"=>"");
        //$title = mb_convert_encoding($alias, 'cp-1251', 'UTF-8');
        $alias = strtr($alias, $iso);
        return $alias;
    }

    /*
    * callback before save
    */
    static $before_save = array("check_alias");

    public function check_alias() {

        if(empty($this->alias)) { $this->alias = $this->good; }

        $this->alias = $this->setAlias($this->alias);

        if(self::exists(array('alias' => $this->alias))) { $this->alias .= "-1"; }

    }


}