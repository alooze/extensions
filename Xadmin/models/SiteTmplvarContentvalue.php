<<<<<<< HEAD
<?php
namespace Modx\Ext\Xadmin\Models;

use ActiveRecord\Model as ARM;
use ActiveRecord\Config as ARC;

//подключаем собственный автозагрузчик AR
require_once MODX_BASE_PATH.'assets/extensions/ActiveRecord/ActiveRecord.php';

class SiteTmplvarContentvalue extends ARM 
{
    /**
     * пока нет способа передавать префикс таблиц в статические атрибуты
     * @Todo: пересмотреть в сторону упрощения
     */
    static $table_name='clpr_site_tmplvar_contentvalues';

    static $belongs_to = array(
    	array(
            'blog_post'
            ,'foreign_key' => 'contentid'
            ,'class_name' => 'BlogPost'
            //,'primary_key' => 'contentid'
            ),
		array(
            'site_tmplvar'
            ,'foreign_key' => 'tmplvarid'
            ,'class_name' => 'SiteTmplvar'
            //,'primary_key' => 'tmplvarid'
            )
    );

}

/**
 * @Todo: вынести куда-то наружу подключение
 */
global $modx;
$u = $modx->db->config['user'];
$p = $modx->db->config['pass'];
$h = $modx->db->config['host'];
$d = trim($modx->db->config['dbase'], '`');
$c = $modx->db->config['charset'];

// echo "mysql://$u:$p@$h/$d?charset=$c";

$connections = array(
    'modx' => "mysql://$u:$p@$h/$d?charset=$c",
);

// initialize ActiveRecord
// change the connection settings to whatever is appropriate for your mysql server 
ARC::initialize(function($cfg) use ($connections)
{
    // $cfg->set_model_directory(MODX_BASE_PATH.'assets/extensions/Xadmin/models/');
    
    $cfg->set_connections($connections);
    
=======
<?php
namespace Modx\Ext\Xadmin\Models;

use ActiveRecord\Model as ARM;
use ActiveRecord\Config as ARC;

//подключаем собственный автозагрузчик AR
require_once MODX_BASE_PATH.'assets/extensions/ActiveRecord/ActiveRecord.php';

class SiteTmplvarContentvalue extends ARM 
{
    /**
     * пока нет способа передавать префикс таблиц в статические атрибуты
     * @Todo: пересмотреть в сторону упрощения
     */
    static $table_name='clpr_site_tmplvar_contentvalues';

    static $belongs_to = array(
    	array(
            'blog_post'
            ,'foreign_key' => 'contentid'
            ,'class_name' => 'BlogPost'
            //,'primary_key' => 'contentid'
            ),
		array(
            'site_tmplvar'
            ,'foreign_key' => 'tmplvarid'
            ,'class_name' => 'SiteTmplvar'
            //,'primary_key' => 'tmplvarid'
            )
    );

}

/**
 * @Todo: вынести куда-то наружу подключение
 */
global $modx;
$u = $modx->db->config['user'];
$p = $modx->db->config['pass'];
$h = $modx->db->config['host'];
$d = trim($modx->db->config['dbase'], '`');
$c = $modx->db->config['charset'];

// echo "mysql://$u:$p@$h/$d?charset=$c";

$connections = array(
    'modx' => "mysql://$u:$p@$h/$d?charset=$c",
);

// initialize ActiveRecord
// change the connection settings to whatever is appropriate for your mysql server 
ARC::initialize(function($cfg) use ($connections)
{
    // $cfg->set_model_directory(MODX_BASE_PATH.'assets/extensions/Xadmin/models/');
    
    $cfg->set_connections($connections);
    
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
});