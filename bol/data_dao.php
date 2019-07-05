<?php

class KOSPLUGIN_BOL_DataDao extends OW_BaseDao
{
    private static $classInstance;

    public static function getInstance()
    {
        if ( self::$classInstance === null )
        {
            self::$classInstance = new self();
        }

        return self::$classInstance;
    }
    public function getDtoClassName()
    {
        return 'KOSPLUGIN_BOL_Data';
    }

    public function getTableName()
    {
        return OW_DB_PREFIX . 'kosplugin_data';
    }


}