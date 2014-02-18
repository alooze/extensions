<?php
namespace Modx\Ext\Xadmin;

use Modx\Ext\Core\ModxExtensionCore as ModxExtensionCore;
use ActiveRecord\Config as ARC;


/**
* Класс для управления внешней админкой в MODX Evolution
*/
class Xadmin extends ModxExtensionCore
{
    
    public $config;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Задаем начальные значения для расширения
     */
    protected function _extInit()
    {
        $this->_extensionName = 'Xadmin';
        $this->_extensionVersion = '0.1a';

        /**
         * @Todo: пересмотреть механизм для большей гибкости
         *      используется для подключения языков и конфигов
         */
        $this->_baseDir = dirname(dirname(__FILE__)).'/';

        /**
         * @Todo: Пока принудительно ставим русский язык, нужно будет заменить на механизм 
         *          определения языка
         */        
        $this->setExtLang('ru');

        /**
         * пытаемся подключить AR библиотеку
         */
        $this->_loadArLib();
    }

    /**
     * Подключение библиотеки Active Records
     */
    protected function _loadArLib()
    {
        global $modx;
        if (!defined('PHP_ACTIVERECORD_AUTOLOAD_PREPEND')) {
            //подключаем собственный автозагрузчик AR
            require_once MODX_BASE_PATH.'assets/extensions/ActiveRecord/ActiveRecord.php';
        }

        $u = $modx->db->config['user'];
        $p = $modx->db->config['pass'];
        $h = $modx->db->config['host'];
        $d = trim($modx->db->config['dbase'], '`');
        // $c = $modx->db->config['charset'];

        // echo "mysql://$u:$p@$h/$d?charset=$c";

        $connections = array(
            // 'modx' => "mysql://$u:$p@$h/$d?charset=$c",
            'modx' => "mysql://$u:$p@$h/$d",
        );

        // initialize ActiveRecord
        // change the connection settings to whatever is appropriate for your mysql server 
        ARC::initialize(function($cfg) use ($connections)
        {
            $cfg->set_model_directory(MODX_BASE_PATH.'assets/extensions/ActiveRecord/models/');
            $cfg->set_connections($connections);
            $cfg->set_default_connection('modx');
            
        });
    }

    /**
     * Загружаем json с описанием полей формы
     */
    public function loadConfig($configKey)
    {
        // echo $this->_baseDir.'config/'.$configKey.'.xadmin.json<br>';
        if (file_exists($this->_baseDir.'config/'.$configKey.'.xadmin.json')) {
            $this->config = json_decode(file_get_contents($this->_baseDir.'config/'.$configKey.'.xadmin.json'), true);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Подгружаем модель для работы Active Records
     */
    public function getArModel()
    {
        return 'Modx\\Ext\\Xadmin\\Models\\'.$this->config['tables'][0]['ar_model'];
    }

    
}