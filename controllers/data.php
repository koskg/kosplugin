<?php

class KOSPLUGIN_CTRL_Data extends OW_ActionController
{


    public function index()
    {
        $language = OW::getLanguage();

        OW::getDocument()->addStyleSheet( OW::getPluginManager()->getPlugin('kosplugin')->getStaticCssUrl().'kosplugin.css' );

        OW::getDocument()->setTitle($language->text("kosplugin", "data_index_page_title"));
        OW::getDocument()->setHeading($language->text("kosplugin", "data_index_page_heading"));

        $service = KOSPLUGIN_BOL_Service::getInstance();
        $formDel = new Form("formDel");

        if ( OW::getRequest()->isPost() && $formDel->isValid($_POST) )
        {
            foreach ($_POST as $key=>$value)
            {
                if($value == 'on')
                {
                    $service->deleteRecord($key);
                }
            }
            $formDel->reset();
        }

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
                "img" => $pluginUrl.$listItem->img,
                "id"=> $listItem->id
            );
            $idList = $listItem->id;
            $checkId = new CheckboxField($idList);
            $formDel->addElement($checkId);
        }
        $this->addForm($formDel);

        $submitDel = new Submit("delSubmit");
        $submitDel->setLabel("delete selected");
        $submitDel->setValue("delete selected");
        $formDel->addElement($submitDel);


        $this->assign("list", $tplList);
    }

















}