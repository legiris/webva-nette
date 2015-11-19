<?php

namespace App\Presenters;

//use Nette\Application\UI\Form;
//use Nette\Mail\Message;
//use Nette\Mail\SendmailMailer;

class KontaktPresenter extends ContactFormPresenter
{
    //public $contactFormFactory;
    
    public function renderDefault()
    {
        $this->template->htmlTitle = 'Kontakt | Virtuální asistentka';
    }
    
}