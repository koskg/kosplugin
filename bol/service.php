<?php

class KOSPLUGIN_BOL_Service

{
    private static $classInstance;

    public static function getInstance()
    {
        if (null === self::$classInstance) {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }


    private $dataDao;

    private function __construct()
    {
        $this->dataDao = KOSPLUGIN_BOL_DataDao::getInstance();
    }


    public function addData( $name, $surname, $email, $age, $img )
    {
        $data = new KOSPLUGIN_BOL_Data;
        $data->name = $name;
        $data->surname = $surname;
        $data->email = $email;
        $data->age = $age;
        $data->img = $img;

        return $this->dataDao->save($data);
    }



}