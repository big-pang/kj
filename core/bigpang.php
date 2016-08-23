<?php
/**
 * Created by PhpStorm.
 * User: bigpang
 * Date: 2016/8/23
 * Time: 10:29
 */

namespace core;
class bigpang
{
    public static $classMap = [];
    public $assign;

    static public function run()
    {
        \core\lib\log::init();
        $route = new \core\lib\route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
        $ctrlfile = APP . '/ctrl/' . $ctrlClass . 'Ctrl.php';
        $class = '\\' . MODULE . '\\ctrl\\' . $ctrlClass . 'Ctrl';
        if (is_file($ctrlfile)) {
            include $ctrlfile;
            $ctrl = new $class;
            $ctrl->$action();
            \core\lib\log::log('ctrl:'.$ctrlClass.'     '.'action:'.$action);
        } else {
            throw new \Exception('找不到控制器' . $ctrlClass);
        }
    }

    static public function load($class)
    {
        if (isset(self::$classMap[$class])) {
            return true;
        } else {
            $class2 = str_replace('\\', '/', $class);
            $file = KJ . '/' . $class2 . '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }

    public function assign($name, $value)
    {
        $this->assign[$name]=$value;
    }

    public function display($file)
    {
        $file=APP.'/views/'.$file;
        if(is_file($file)){
            extract($this->assign);
            include $file;
        }else{
            throw new \Exception('找到视图'.$file);
        }
    }
}