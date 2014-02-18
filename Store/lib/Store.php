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
}