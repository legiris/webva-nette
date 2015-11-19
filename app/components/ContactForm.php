<?php

//namespace App\Components;


use Nette\Application\UI;
use Tracy\Debugger;
use Nette\Forms\Form;

//class ContactForm extends UI\Control
class ContactForm extends Nette\Object
{
    
    public function render()
    {
        //$this->template->setFile(__DIR__ . '/ContactForm.latte');
        //$this->template->render();
    }

    //protected function createComponentContactForm()
    public function create()
    {
        $form = new UI\Form;
        $form->addText('name')->setHtmlId('name')
            ->setAttribute('class', 'form-control')
            ->setAttribute('placeholder', 'Jméno *')
            ->setAttribute('required data-validation-required-message="Please enter your name."');
        $form->addText('email')->setType('email')->setHtmlId('email')
            ->setAttribute('class', 'form-control')
            ->setAttribute('placeholder', 'Vaše e-mailová adresa *')
            ->setAttribute('required data-validation-required-message="Please enter your email address."');
        $form->addText('phone')->setType('tel')->setHtmlId('phone')
            ->setAttribute('class', 'form-control')
            ->setAttribute('placeholder', 'Vaše telefonní číslo *')
            ->setAttribute('required data-validation-required-message="Please enter your phone number."');
        $form->addTextArea('message')->setHtmlId('message')
            ->setAttribute('class', 'form-control')
            ->setAttribute('rows', '5')
            ->setAttribute('placeholder', 'Text zprávy *')
            ->setAttribute('required data-validation-required-message="Please enter a message."');
        $form->addSubmit('send', 'Odeslat');
        $form->getOwnErrors();
        $form->addError('baf');
        //$form->onSuccess[] = $this->contactFormSucceded;
        return $form;
    }
    
    public function contactFormSucceded($form)
    {
        $values = $form->getValues();
        //Debugger::dump($values);
        //$this->presenter->flashMessage('Form is Ok');
    }
    
    
}
