<?php
/**
 * Created by PhpStorm.
 * User: alexc
 * Date: 26/02/2018
 * Time: 14:59
 */

namespace Framework\Database;


class MySQL extends General
{
    /**
     * @var mixed instance of MySQL Class
     */
    private $mysql;

    private function getDb()
    {
        if (is_null($this->config))
        {
            try {
                $this->mysql = new \PDO(
                    "{$this->config['engine']}:host={$this->config['host']};dbname={$this->config['name']};",
                    $this->config['auth']['username'],
                    $this->config['auth']['password']
                );
                $this->mysql->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_WARNING);
                $this->mysql->setAttribute(\PDO::ATTR_CASE, \PDO::CASE_LOWER);
            } catch(\PDOException $e) {
                die ("[SQL ERROR]: {$e}");
            }
        }
        return $this->mysql;
    }

    public function query($sth, $attr = [], $one = false)
    {
        $req = $this->getDb()->prepare($sth);
        $res = $req->execute($attr);
        if (strpos("INSERT", $req) === 0 && strpos("UPDATE", $req) === 0 && strpos("DELETE", $req) === 0)
        {
            return $res;
        }
        if ($one)
        {
            return $req->fetch();
        } else {
            return $req->fetchAll();
        }
    }

    public function lastInsertId()
    {
        return $this->getDb()->lastInsertId();
    }
}