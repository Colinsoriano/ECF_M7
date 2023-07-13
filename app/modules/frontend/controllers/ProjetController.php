<?php
declare(strict_types=1);

namespace Test\Modules\Frontend\controllers;

use Test\Models\Projet;

class ProjetController extends ControllerBase
{

    public function indexAction()
    {

        $projetsForTable = [];
        foreach (Projet::find() as $projet)
        {

            // populate for table content
            $projetsForTable [] = [
                'type' => $projet->translateType(),
            ];
        }
        $this->view->setVar('projetsForTable' , $projetsForTable);
    }

}
