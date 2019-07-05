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


    public function addData( $text )
    {
        $data = new KOSPLUGIN_BOL_Data;
        $data->text = $text;
        return $this->dataDao->save($data);
    }



}