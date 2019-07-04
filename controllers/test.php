<?php
/**
 * Created by PhpStorm.
 * User: kos
 * Date: 01.04.2019
 * Time: 16:19
 */


class KOSPLUGIN_CTRL_Test extends OW_ActionController
{
/*    public function init()
    {

        OW::getDocument()->addStyleSheet( OW::getPluginManager()->getPlugin('kosplugin')->getStaticCssUrl().'kosplugin.css' );

    }*/
    public function index()
    {
        $language = OW::getLanguage();
        //$router = OW::getRouter();

        OW::getDocument()->addStyleSheet( OW::getPluginManager()->getPlugin('kosplugin')->getStaticCssUrl().'kosplugin.css' );

        OW::getDocument()->setTitle($language->text("kosplugin", "index_page_title"));
        OW::getDocument()->setDescription($language->text("kosplugin", "index_page_description"));
        OW::getDocument()->setHeading($language->text("kosplugin", "index_page_heading"));
    }
}