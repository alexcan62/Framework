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
     * @var array
     */
    public $file = [];

    /**
     * Config constructor.
     * @param $file
     */
    public function __construct($file)
    {
        $this->file = require ROOT.'/config/'.$file.'.php';
        return $this->file;
    }
}