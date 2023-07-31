<?php
declare(strict_types=1);

namespace Test\Modules\Frontend\Controllers;

use Test\Models\Collaborateur;

class CollaborateurController extends ControllerBase
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
                'label' => $collaborateur->getPrenom()." ".$collaborateur->getNom()." ".$collaborateur->translateNiveau(),
            ];

            // populate for table content
            $collabsForTable [] = [
                'prenom' => $collaborateur->getPrenom(),
                'nom' => $collaborateur->getNom(),
                'niveau_competence' => $collaborateur->translateNiveau(),
                'prime' => $collaborateur->getPrimeEmbauche(),
            ];
        }
        $this->view->setVar('collaborateurs' , $collaborateurs);
        $this->view->setVar('collabsForTable' , $collabsForTable);
    }

}
