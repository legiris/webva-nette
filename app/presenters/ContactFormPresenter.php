<?php

namespace App\Presenters;

use Nette\Application\UI\Form;
use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;

class ContactFormPresenter extends BasePresenter
{
    /**
     * inicializuje formular
     * @return \Nette\Application\UI\Form
     * https://ondrej.mirtes.cz/dokonaly-kontaktni-formular-za-10-minut
     * https://github.com/nette/forms - add netteForms.js
     */
    public function createComponentContactForm()
    {
        $form = new Form;
        $form->addText('name')->setAttribute('placeholder', 'Jméno *')
            ->setAttribute('class', 'form-control')
            ->addRule(Form::FILLED, 'Zadejte jméno.');
        $form->addText('email')->setType('email')
            ->setAttribute('placeholder', 'Vaše e-mailová adresa *')
            ->setAttribute('class', 'form-control')
            ->addRule(Form::FILLED, 'Zadejte e-mailovou adresu.')
                ->addCondition(Form::FILLED)
                ->addRule(Form::EMAIL, 'E-mailová adresa nemá platný formát.');
                //->addRule(Form::MIN_LENGTH, 'Zpráva musí být minimálně %d znaků dlouhá.', 50);
        $form->addText('phone')->setAttribute('placeholder', 'Vaše telefonní číslo *')
            ->setAttribute('class', 'form-control')
            ->addRule(Form::FILLED, 'Zadejte telefon.');
        $form->addTextArea('message')->setAttribute('placeholder', 'Text zprávy *')
            ->setAttribute('class', 'form-control')
            ->setAttribute('rows', 6)
            ->addRule(Form::FILLED, 'Zadejte text.');
            //->addRule(Form::MIN_LENGTH, 'Zpráva musí být minimálně %d znaků dlouhá.', 50);
        $form->addSubmit('send', 'ODESLAT')
            ->setAttribute('class', 'btn btn-primary input-ref-default');
        
        $form->onSuccess[] = $this->handleContactForm;
        
        return $form;
    }
    
    
    /**
     * obsluha formulare
     * @param \Nette\Application\UI\Form $form
     */
    public function handleContactForm(Form $form)
    {
        try {
            $this->sendMail($form->getValues());
            $this->flashMessage('Zpráva byla odeslána!');
            $this->redirect('this');
        } catch (\Nette\InvalidStateException $e) {
            $form->addError('Nepodařilo se odeslat e-mail, zkuste to prosím později.');
        }
    }
    
    /**
     * posle e-mail
     * @param array $values
     */
    protected function sendMail($values)
    {
        $mail = new Message;
        $mail->addTo('xis@email.cz')
            ->addTo('Zuzana.Hajkova@insolvence.as')
            ->setFrom($values['email'])
            ->setSubject('Virtuální asistentka - nová zpráva');
        
        $template = $this->createTemplate();
        $template->setFile(__DIR__ . '/templates/ContactFormMail.latte');
        
        $template->name = $values['name'];
        $template->email = $values['email'];
        $template->phone = $values['phone'];
        $template->message = $values['message'];
        
        $mail->setHtmlBody($template);
        
        $mailer = new SendmailMailer;
        $mailer->send($mail);
    }
    
}