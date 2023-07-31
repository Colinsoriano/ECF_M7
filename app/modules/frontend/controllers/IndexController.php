<?php
declare(strict_types=1);

namespace Test\Modules\Frontend\Controllers;

use Test\Models\Collaborateur;

class IndexController extends ControllerBase
{

    public function indexAction()
    {
        $collaborateurs = [];
        $collabsForTable = [];
        foreach (Collaborateur::find() as $collaborateur)
        {
            // populate for select options
            $collaborateurs [] = [
                'value' => $collaborateur->getId(),
                'label' => $collaborateur->getPrenom()." ".$collaborateur->getNom(),
            ];

            // populate for table content
            $collabsForTable [] = [
                'prenom' => $collaborateur->getPrenom(),
                'nom' => $collaborateur->getNom(),
                'prime' => $collaborateur->getPrimeEmbauche(),
            ];
        }
        $this->view->setVar('collaborateurs' , $collaborateurs);
    }

}

