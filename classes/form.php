<?php

class KOSPLUGIN_CLASS_Form extends Form
{
    /**
     * KOSPLUGIN_CLASS_Form constructor.
     * @param string $name
     */
    public function __construct($name = 'database_form')
    {
        parent::__construct($name);

        $language = OW::getLanguage();

        $this->setEnctype(Form::ENCTYPE_MULTYPART_FORMDATA);


        //form for name
        //$this->setAjax(true);
        $nameField = new TextField("name");
        $nameField->setLabel($language->text("kosplugin", "form_page_name_label"));
        $nameField->setDescription($language->text("kosplugin", "form_page_name_description"));
        $nameField->setHasInvitation(true);
        $nameField->setRequired();
        $this->addElement($nameField);

        //form for surname
        $surnameField = new TextField("surname");
        $surnameField->setLabel($language->text("kosplugin", "form_page_surname_label"));
        $surnameField->setDescription($language->text("kosplugin", "form_page_surname_description"));
        $surnameField->setHasInvitation(true);
        $surnameField->setRequired();
        $this->addElement($surnameField);

        //form for email
        $emailField = new TextField("email");
        $emailField->setLabel($language->text("kosplugin", "form_page_email_label"));
        $emailField->setDescription($language->text("kosplugin", "form_page_email_description"));
        $emailField->setHasInvitation(true);
        $emailField->setInvitation("email");
        $emailValidator = new EmailValidator();
        $emailField->addValidator($emailValidator);
        $emailField->setRequired();
        $this->addElement($emailField);

        //form for age
        $ageField = new TextField("age");
        $ageField->setLabel($language->text("kosplugin", "form_page_age_label"));
        $ageField->setDescription($language->text("kosplugin", "form_page_age_description"));
        $ageField->setHasInvitation(true);
        $ageValidator = new IntValidator(18,120);
        $ageField->setInvitation("18+");
        $ageField->addValidator($ageValidator);
        $ageField->setRequired();
        $this->addElement($ageField);

        //form for img
        $imgField = new FileField("img");
        $imgField->setLabel($language->text("kosplugin", "form_page_img_label"));
        $imgField->setDescription($language->text("kosplugin", "form_page_img_description"));
     //   $imgField->setRequired();
        $this->addElement($imgField);

        $submit = new Submit("submit");
        $submit->setLabel("submit");

        $this->addElement($submit);
    }

}