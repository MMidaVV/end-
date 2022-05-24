<?php

class DB {

    protected static $_instance;

    public static function getInstance() {
        if (self::$_instance === null) {
            self::$_instance = new self;
        }
        return self::$_instance;
    }

    private  function __construct() {
        $this->connect = mysqli_connect("127.0.0.1", "root", "") or die("Невозможно установить соединение".mysqli_error($this->connect));
        mysqli_select_db( $this->connect, "register-bd") or die ("Невозможно выбрать указанную базу".mysqli_error($this->connect));
        $this->query('SET names "utf8"');
    }

    private function __clone() {
    }

    private function __wakeup() {
    }

    public static function query($sql) {

        $obj=self::$_instance;

        if(isset($obj->connect)){
            $obj->count_sql++;
            $start_time_sql = microtime(true);
            $result=mysqli_query($obj->connect,$sql)or die("<br/><span style='color:red'>Ошибка в SQL запросе:</span> ".$obj->connect->error);
            $time_sql = microtime(true) - $start_time_sql;
            return $result;
        }
        return false;
    }


    public static function fetch_object($object)
    {
        return @mysqli_fetch_object($object);
    }


    public static function fetch_array($object)
    {
        return @mysqli_fetch_array($object);
    }

    public static function insert_id()
    {
        return @mysqli_insert_id();
    }


}