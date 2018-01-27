<?php
/**
 * Created by PhpStorm.
 * User: Petr
 * Date: 26.1.2018
 * Time: 18:57
 */


class DB
{
    private $pdo;

    public function __construct(array $dbconfig)
    {
        $pdo = new PDO($dbconfig['driver'] . ':host=' . $dbconfig['host'] . ';dbname=' . $dbconfig['dbname'], $dbconfig['username'], $dbconfig['password']);
    }

    public function select($query, $args)
    {
        $matches = [];
        preg_match(':[a-zA-Z]*',$query,$matches);

        $params = [];
        $i=0;
        foreach ($matches as $match){
            $params[$match] = $args[$i];
        }

        $stm = $this->pdo->prepare($query);
        $stm->execute($params);

        return $stm->fetch(PDO::FETCH_ASSOC);
    }
}