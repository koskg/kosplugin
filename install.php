<?php

/*$path = OW::getPluginManager()->getPlugin('kosplugin')->getRootDir() . 'langs.zip';
BOL_LanguageService::getInstance()->importPrefixFromZip($path, 'kosplugin');*/
$pluginKey = 'kosplugin';
$plugin = OW::getPluginManager()->getPlugin($pluginKey);
OW::getLanguage()->importLangsFromDir($plugin->getRootDir() . 'langs');


$query = "CREATE TABLE IF NOT EXISTS `" . OW_DB_PREFIX . "kosplugin_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";

OW::getDbo()->query($query);
