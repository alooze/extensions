<?php
namespace Modx\Ext\Xadmin\Models;

use ActiveRecord\Model;

class Shop extends Model 
{
    /**
     * Нет способа передавать префикс таблиц в статические атрибуты
     * @Todo: пересмотреть в сторону упрощения
     */
    static $table_name='guns_xa_shops';

}