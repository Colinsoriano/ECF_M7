<?php
declare(strict_types=1);

namespace Test\Modules\Frontend\controllers;

use Test\Models\Projet;

class ProjetController extends ControllerBase
{

    public function indexAction()
    {
        $projet = [];
        $projetsForTable = [];
        foreach (Projet::find() as $projet)
        {
            // populate for select options
            $projet [] = [
                'value' => $projet->getId(),
                'label' => $projet->getType(),
            ];

            // populate for table content
            $projetsForTable [] = [
                'type' => $projet->translateType(),
            ];
        }
        $this->view->setVar('projet' , $projet);
        $this->view->setVar('projetsForTable' , $projetsForTable);
    }

}
