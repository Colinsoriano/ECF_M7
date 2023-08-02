<?php
declare(strict_types=1);

namespace Test\Modules\Frontend\Controllers;

use Test\Models\Projet;

class ProjetController extends ControllerBase
{

    public function indexAction()
    {
        $projetsOptions = [];
        $projetsForTable = [];
        foreach (Projet::find() as $projet)
        {
            // populate for select options
            $projetsOptions[] = [
                'value' => $projet->getId(),
                'label' => $projet->getType(),
            ];

            // populate for table content
            $projetsForTable[] = [
                'type' => $projet->translateType(),
            ];
        }
        $this->view->setVar('projetsOptions', $projetsOptions);
        $this->view->setVar('projetsForTable', $projetsForTable);
    }

}