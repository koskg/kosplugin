<?php
/**
 * Created by PhpStorm.
 * User: kos
 * Date: 01.04.2019
 * Time: 16:19
 */


class KOSPLUGIN_CTRL_Data extends OW_ActionController
{

    public function index()
    {
        $language = OW::getLanguage();


        OW::getDocument()->addStyleSheet( OW::getPluginManager()->getPlugin('kosplugin')->getStaticCssUrl().'kosplugin.css' );

        OW::getDocument()->setTitle($language->text("kosplugin", "data_index_page_title"));
        OW::getDocument()->setHeading($language->text("kosplugin", "data_index_page_heading"));


        $service = KOSPLUGIN_BOL_Service::getInstance();

        $list = $service->findList();

        $tplList = array();

        $pluginUrl = OW::getPluginManager()->getPlugin('kosplugin')->getUserFilesUrl();

        foreach ( $list as $listItem )
        {
            $tplList[] = array(
                "name" => $listItem->name,
                "surname" => $listItem->surname,
                "email" => $listItem->email,
                "age" => $listItem->age,
                "img" => $pluginUrl.$listItem->img
            );
        }

        $this->assign("list", $tplList);

    }

















}