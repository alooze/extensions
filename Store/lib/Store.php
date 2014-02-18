<<<<<<< HEAD
<?php
namespace Modx\Ext\Store;

use Modx\Ext\Core\ModxExtensionCore as ModxExtensionCore;

/**
 * Класс для управления каталогами
 * @Version: 0.1a 
 * @Author: alooze <a.looze@gmail.com>
 * 
 */

class Store extends ModxExtensionCore
{

    /**
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    private function _extInit()
    {
        $this->extensionName = 'Store';
        $this->extensionVersion = '0.1a';
    }

    // public function __construct($config = '')
    // {
    //     //получаем из конфига данные о полях каталога и их связях
    //     //
    // }
=======
<?php
namespace Modx\Ext\Store;

use Modx\Ext\Core\ModxExtensionCore as ModxExtensionCore;

/**
 * Класс для управления каталогами
 * @Version: 0.1a 
 * @Author: alooze <a.looze@gmail.com>
 * 
 */

class Store extends ModxExtensionCore
{

    /**
     *
     */
    function __construct()
    {
        parent::__construct();
    }

    private function _extInit()
    {
        $this->extensionName = 'Store';
        $this->extensionVersion = '0.1a';
    }

    // public function __construct($config = '')
    // {
    //     //получаем из конфига данные о полях каталога и их связях
    //     //
    // }
>>>>>>> e7fd71c0bb76ce46318f11d43e467a3bec2b7b76
}