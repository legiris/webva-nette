<?php

namespace App\Presenters;


class HomepagePresenter extends ContactFormPresenter
{
    
    public function renderDefault()
    {
        $this->template->htmlTitle = 'Virtuální asistentka';
    }

}