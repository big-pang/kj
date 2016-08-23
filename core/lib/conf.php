<?php
namespace core\lib;

class conf
{

    static public $conf = [];

    /**
     * @param $name
     * @param $file
     * @throws \Exception
     */
    static public function get($name, $file)
    {
        $path = KJ . '/core/conf/' . $file . '.php';
        if (isset(self::$conf[$file])) {
            return self::$conf[$file][$name];
        } else {
            if (is_file($path)) {
                $conf = include $path;
                if (isset($conf[$name])) {
                    self::$conf[$file] = $conf;
                    return $conf[$name];
                } else {
                    throw new \Exception('没有这个配置项' . $name);
                }
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }

    static public function all($file)
    {
        $path = KJ . '/core/conf/' . $file . '.php';
        if (isset(self::$conf[$file])) {
            return self::$conf[$file];
        } else {
            if (is_file($path)) {
                $conf = include $path;
                self::$conf[$file] = $conf;
                return $conf;
            } else {
                throw new \Exception('找不到配置文件' . $file);
            }
        }
    }
}