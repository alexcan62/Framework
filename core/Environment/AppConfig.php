<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 25/02/2018
 * Time: 13:44
 */

namespace Framework\Environment;


class AppConfig implements Config
{
    /**
     * @var array
     */
    private $file;

    /**
     * App constructor.
     */
    public function __construct()
    {
        $this->file = require ROOT.'/config/app.php';
    }

    /**
     * @param $keys array
     * @return mixed
     */
    public function get(...$keys)
    {
        // TODO: Implement get() method.
        $data = [];
        foreach ($keys as $key)
        {
            if (array_key_exists($key, $this->file))
            {
                array_push($data, [$key => $this->file[$key]]);
            }
            else
            {
                array_push($data, [$key => null]);
            }
        }
        return $data;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        // TODO: Implement getAll() method.
        return $this->file;
    }
}