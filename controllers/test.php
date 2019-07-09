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

            $imageName = "--";

            if ( (int) $_FILES['img']['error'] !== 0 || !is_uploaded_file($_FILES['img']['tmp_name']) || !UTIL_File::validateImage($_FILES['img']['name']) )
            {
                OW::getFeedback()->error("not_valid_image");
            }
            else
            {
                $storage = OW::getStorage();

                $imagesDir = OW::getPluginManager()->getPlugin('kosplugin')->getUserFilesDir();
                $imageName = 'ava_'.md5($_FILES['img']['name']).'.jpg';
                $imagePath = $imagesDir . $imageName;

                if ( $storage->fileExists($imagePath) )
                {
                    $storage->removeFile($imagePath);
                }

                $image = new UTIL_Image($_FILES['img']['tmp_name']);

                $image->resizeImage(200, null)->saveImage($imagePath);

                unlink($_FILES['image']['tmp_name']);
            }

            $service->addData($values["name"],$values["surname"],$values["email"],$values["age"], $imageName);

            OW::getFeedback()->info("Record added");

            $this->redirect();
        }

        $this->addForm($form);
    }
















}