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
        $router = OW::getRouter();

        OW::getDocument()->addStyleSheet( OW::getPluginManager()->getPlugin('kosplugin')->getStaticCssUrl().'kosplugin.css' );

        OW::getDocument()->setTitle($language->text("kosplugin", "index_page_title"));
        OW::getDocument()->setHeading($language->text("kosplugin", "index_page_heading"));


        $testMenu = array();

        $testMenu[] = array(
            "label" => "Form",
            "url" => $router->urlFor("KOSPLUGIN_CTRL_Test", "form")
        );

        $testMenu[] = array(
            "label" => "22222",
            "url" => $router->urlForRoute("kosplugin-index")
        );
        $this->assign("menu", $testMenu);

    }

    public function form()
    {
        OW::getDocument()->setTitle("Form");
        OW::getDocument()->setHeading("Заговок");

        $form = new KOSPLUGIN_CLASS_Test();

        $service = KOSPLUGIN_BOL_Service::getInstance();

        if ( OW::getRequest()->isPost() && $form->isValid($_POST) )
        {
            $values = $form->getValues();
            $service->addData($values["text"]);

            OW::getFeedback()->info("Запись добавлена");

            $this->redirect();
        }

        $this->addForm($form);
    }
















}