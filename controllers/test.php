<?php
/**
 * Created by PhpStorm.
 * User: kos
 * Date: 01.04.2019
 * Time: 16:19
 */


class KOSPLUGIN_CTRL_Test extends OW_ActionController
{

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
            "label" => "View data",
            "url" => $router->urlForRoute("kosplugin-data")
        );
        $this->assign("menu", $testMenu);

    }

    public function form()
    {
        OW::getDocument()->setTitle("Form");
        OW::getDocument()->setHeading("Form");

        $form = new KOSPLUGIN_CLASS_Form();

        $service = KOSPLUGIN_BOL_Service::getInstance();

        if ( OW::getRequest()->isPost() && $form->isValid($_POST) )
        {
            $values = $form->getValues();
            $service->addData($values["name"],$values["surname"],$values["email"],$values["age"],4);

            OW::getFeedback()->info("Record added");

            $this->redirect();
        }

        $this->addForm($form);
    }
















}