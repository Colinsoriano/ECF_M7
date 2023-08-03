<?php
declare(strict_types=1);

namespace Test\Modules\Frontend\Controllers;

use Test\Models\ChefDeProjet;

class ChefDeProjetController extends ControllerBase

{
    public function indexAction()
    {
        $chefDeProjets = [];
        $chefsDeProjetForTable = [];

        // Fetch all chef de projets from the database
        $allChefsDeProjet = ChefDeProjet::find();

      foreach ($allChefsDeProjet as $chefDeProjet)
        {
            // populate for select options
            $chefDeProjets [] = [
                'value' => $chefDeProjet->getBoostProduction(),
            ];

            // populate for table content
            $chefsDeProjetForTable [] = [
                'prenom' => $chefDeProjet->getPrenom(),
                'nom' => $chefDeProjet->getNom(),
                'boost' => $chefDeProjet->getBoostProduction(),
            ];
        }

        // Pass the chef de projets and chefsDeProjetForTable data to the view
        $this->view->setVar('chefDeProjets' , $chefDeProjets);
        $this->view->setVar('chefsDeProjetForTable' , $chefsDeProjetForTable);
    }
}
