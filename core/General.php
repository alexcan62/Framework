<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 25/02/2018
 * Time: 13:24
 */

namespace Framework;


use Framework\Database\MySQL;
use Framework\Environment\Config;

class General
{
    /**
     * @var General
     */
    private static $_instance;

    /**
     * @var \Framework\Database\MySQL
     */
    private $db;

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
        $this->config['app'] = new Config("app");
        $this->config['database'] = new Config("database");
        $this->config['mail'] = new Config("mail");
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

    public function getDb()
    {
        if (is_null($this->db))
        {
            $this->db = new MySQL();
        }
        return $this->db;
    }
}