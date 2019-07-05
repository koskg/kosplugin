<?php
/**
 * Created by PhpStorm.
 * User: kos
 * Date: 01.04.2019
 * Time: 16:19
 */


class KOSPLUGIN_CLASS_Test extends Form
{
    public function __construct($name = 'database_form')
    {
        parent::__construct($name);

//        $this->setAction('/sdfsdkfsdf');

        $this->setAjax(true);
        $textField = new TextField("text");
        $textField->setLabel("Label");
        $textField->setDescription("Description");
        $textField->setHasInvitation(false);
        $textField->setInvitation('Hi');
        $textField->setRequired();

        $this->addElement($textField);

        $submit = new Submit("submit");
        $submit->setLabel("Кнопка");

        $this->addElement($submit);

    }

}