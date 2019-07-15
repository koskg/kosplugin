<?php

class KOSPLUGIN_BOL_Service

{
    private static $classInstance;

    /**
     * Returns an instance of class
     * @return KOSPLUGIN_BOL_Service
     */
    public static function getInstance()
    {
        if (null === self::$classInstance) {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }

    /**
     * @var KOSPLUGIN_BOL_DataDao
     */
    private $dataDao;

    /**
     * KOSPLUGIN_BOL_Service constructor.
     */
    private function __construct()
    {
        $this->dataDao = KOSPLUGIN_BOL_DataDao::getInstance();
    }


    /**
     * @param string $name
     * @param string $surname
     * @param string $email
     * @param int $age
     * @param string $img
     *
     */
    public function addData( $name, $surname, $email, $age, $img )
    {
        $data = new KOSPLUGIN_BOL_Data;
        $data->name = $name;
        $data->surname = $surname;
        $data->email = $email;
        $data->age = $age;
        $data->img = $img;

        $this->dataDao->save($data);
    }

    /**
     * @return array
     */
    public function findList()
    {
        return $this->dataDao->findAll();
    }



    /**
     * @param int $id
     */
    public function deleteRecord($id)
    {
        $this->dataDao->deleteById($id);
    }


}