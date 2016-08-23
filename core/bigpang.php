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

    static public function run()
    {
        p('ok');
        $route = new \core\lib\route();
        p($route);
    }

    static public function load($class)
    {
        if (isset(self::$classMap[$class])) {
            return true;
        } else {
            $class2 = str_replace('\\', '/', $class);
            $file = KJ .'/'. $class2 . '.php';
            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }
}