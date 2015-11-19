<?php

namespace App\Presenters;


class ReferencePresenter extends BasePresenter
{
    public function renderDefault()
    {
        $this->template->htmlTitle = 'Reference | Virtuální asistentka';
    }
    
}
