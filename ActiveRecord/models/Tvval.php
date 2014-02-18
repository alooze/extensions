<<<<<<< HEAD
<?php
namespace Modx\Ext\Xadmin\Models;

use ActiveRecord\Model;

class Tvval extends Model 
{
    /**
     * пока нет способа передавать префикс таблиц в статические атрибуты
     * @Todo: пересмотреть в сторону упрощения
     */
    static $table_name='guns_site_tmplvar_contentvalues';

    static $belongs_to = array(
            array('post', 'foreign_key' => 'contentid', 'class_name'=>'Post'),
            array('tv', 'foreign_key' => 'tmplvarid', 'class_name'=>'Tv')
    );

=======
<?php
namespace Modx\Ext\Xadmin\Models;

use ActiveRecord\Model;

class Tvval extends Model 
{
    /**
     * пока нет способа передавать префикс таблиц в статические атрибуты
     * @Todo: пересмотреть в сторону упрощения
     */
    static $table_name='guns_site_tmplvar_contentvalues';

    static $belongs_to = array(
            array('post', 'foreign_key' => 'contentid', 'class_name'=>'Post'),
            array('tv', 'foreign_key' => 'tmplvarid', 'class_name'=>'Tv')
    );

>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
}