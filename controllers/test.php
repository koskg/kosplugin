<?php
/**
 * Created by PhpStorm.
 * User: kos
 * Date: 01.04.2019
 * Time: 16:19
 */


class KOSPLUGIN_CTRL_Test extends OW_ActionController
{
    public function init()
    {

        OW::getDocument()->addStyleSheet( OW::getPluginManager()->getPlugin('kosplugin')->getStaticCssUrl().'kosplugin.css' );

    }
    public function index()
    {
     //   OW::getDocument()->addStyleSheet( OW::getPluginManager()->getPlugin('kosplugin')->getStaticCssUrl().'kosplugin.css' );
    }
}