<?php
namespace core\lib;

class conf
{

    static public $conf=[];
    /**
     * @param $name
     * @param $file
     * @throws \Exception
     */
    static public function get($name, $file)
    {
        $file = KJ.'/core/confi/'.$file.'.php';
        if (isset(self::$conf[$file]) || is_file($file)){
            $conf = isset(self::$conf[$file]) ?  self::$conf[$file] : include $file;
            if(isset($conf[$name])){
                self::$conf[$file]=$conf;
                return $conf[$name];
            }else{
                throw new \Exception('没有这个配置项'.$name);
            }

        }else{
            throw new \Exception('找不到配置文件'.$file);
        }
    }
}