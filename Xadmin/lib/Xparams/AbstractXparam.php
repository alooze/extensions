<?php
namespace Modx\Ext\Xadmin\Xparams;

// use Modx\Ext\Core\ModxExtensionCore as ModxExtensionCore;
// use ActiveRecord\Config as ARC;

/**
 * Абстрактный класс для реализации логики работы и внешнего вида расширенных параметров
 */

abstract class AbstractXparam
{
    public $type;
    public $widget;
    public $name;

    /**
     * Конструктор
     * @param string $name Название параметра
     * @param string $type Внутреннее название типа ввода параметра
     * @param string $widget Внутреннее название типа вывода параметра
     */
    public function __construct($name, $type='', $widget='')
    {
        if (isset($name) && trim($name) != '') {
            $this->name = strtolower($name);
        } else {
            $this->name = 'undefined';
        }

        if (isset($type) && trim($type) != '') {
            $this->type = ucfirst(strtolower($type));
        } else {
            $this->type = 'Text';
        }

        if (isset($widget) && trim($widget) != '') {
            $this->widget = ucfirst(strtolower($widget));
        } else {
            $this->widget = 'Text';
        }
    }


}