<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 25/02/2018
 * Time: 13:40
 */

namespace Framework\Environment;


abstract class Config
{
    /**
     * @var array Data from the config file
     */
    private $array = [];

    public function __construct($file)
    {
        $this->array = require ROOT.'/config/'.$file.'.php';
    }

    /**
     * @param $key
     * @return mixed
     */
    public function get(...$key)
    {
        $data = [];
        foreach ($key as $k)
        {
            if (array_key_exists($k, $this->array))
            {
                array_push($data, [$k => $this->array[$k]]);
            }
        }
        return $data;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->array;
    }
}