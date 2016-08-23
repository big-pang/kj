<?php
namespace core\lib;

class model extends \medoo
{
    public function __construct()
    {
        $option = conf::all('database');

        parent::__construct($option);
    }
}