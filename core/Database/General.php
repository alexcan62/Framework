<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 26/02/2018
 * Time: 14:51
 */

namespace Framework\Database;


use Framework\Environment\Config;

class General
{
    /**
     * @var array Data from the database configuration file
     */
    protected $config = [];

    /**
     * General constructor.
     */
    public function __construct()
    {
        $this->config = new Config("database");
    }
}