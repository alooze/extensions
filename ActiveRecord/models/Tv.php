<<<<<<< HEAD
<?php
namespace Modx\Ext\Xadmin\Models;

use ActiveRecord\Model;

class Tv extends Model 
{
    /**
     * пока нет способа передавать префикс таблиц в статические атрибуты
     * @Todo: пересмотреть в сторону упрощения
     */
    static $table_name='guns_site_tmplvars';

    static $has_many = array(
        array('tvv', 'foreign_key' => 'tmplvarid', 'class_name'=>'Tvval')
    );

=======
<?php
namespace Modx\Ext\Xadmin\Models;

use ActiveRecord\Model;

class Tv extends Model 
{
    /**
     * пока нет способа передавать префикс таблиц в статические атрибуты
     * @Todo: пересмотреть в сторону упрощения
     */
    static $table_name='guns_site_tmplvars';

    static $has_many = array(
        array('tvv', 'foreign_key' => 'tmplvarid', 'class_name'=>'Tvval')
    );

>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
}