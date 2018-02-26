<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 25/02/2018
 * Time: 13:40
 */

namespace Framework\Environment;


class Config
{
    /**
     * @var array Data from the config file
     */
    private $array = [];

    /**
     * Config constructor.
     * @param $file
     */
    public function __construct($file)
    {
        $this->array = require ROOT.'/config/'.$file.'.php';
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->array;
    }
}