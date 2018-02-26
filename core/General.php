<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 25/02/2018
 * Time: 13:24
 */

namespace Framework;


use Framework\Environment\Config;

class General
{
    /**
     * @var General
     */
    private static $_instance;

    /**
     * @var array Data from the Config class
     */
    private $config = [];

    /**
     * @return General
     */
    public static function getInstance()
    {
        if (is_null(self::$_instance))
        {
            self::$_instance = new General();
        }
        return self::$_instance;
    }

    /**
     * General constructor.
     */
    public function __construct()
    {
        $appConf = new Config("app");
        $dbConf = new Config("database");
        $mailConf = new Config("mail");

        $this->config["general"] = $appConf->get();
        $this->config["database"] = $dbConf->get();
        $this->config["mail"] = $mailConf->get();
    }

    /**
     * @param $key
     * @return mixed|null
     */
    public function getKey($key)
    {
        if(array_key_exists($this->config, $key))
        {
            return $this->config[$key];
        }
        return null;
    }

    /**
     * @return array
     */
    public function getConf()
    {
        return $this->config;
    }
}