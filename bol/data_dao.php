<?php

class KOSPLUGIN_BOL_DataDao extends OW_BaseDao
{
    /**
     * @var
     */
    private static $classInstance;

    /**
     * Returns an instance of class
     * @return KOSPLUGIN_BOL_DataDao
     */
    public static function getInstance()
    {
        if ( self::$classInstance === null )
        {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }


    /**
     * @return string
     */
    public function getDtoClassName()
    {
        return 'KOSPLUGIN_BOL_Data';
    }

    /**
     * @return string
     */
    public function getTableName()
    {
        return OW_DB_PREFIX . 'kosplugin_data';
    }


}