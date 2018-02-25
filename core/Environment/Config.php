<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 25/02/2018
 * Time: 13:40
 */

namespace Framework\Environment;


interface Config
{
    /**
     * @param $key
     * @return mixed
     */
    public function get(...$key);

    /**
     * @return mixed
     */
    public function getAll();
}