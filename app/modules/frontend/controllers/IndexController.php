<?php
declare(strict_types=1);

namespace Test\Modules\Frontend\Controllers;

use Test\Models\Client;
use Test\Models\Projet;
use Test\Models\ChefDeProjet;
use Test\Models\Developpeur;

class IndexController extends ControllerBase
{

    public function indexAction()
    {

        $clientsOptions = [];
        foreach (Client::find() as $client)
        {
            // populate for select options
            $clientsOptions [] = [
                'value' => $client->getIdClient(),
                'label' => "{$client->getRaisonSociale()} (type : ".($client->getSs2i() ? 'SS2I' : 'Non SS2I').")",
            ];
        }
        $this->view->setVar('clientsOptions', $clientsOptions);

        $projetsOptions = [];
        foreach (Projet::find() as $projet)
        {
            // populate for select options
            $projetsOptions [] = [
                'value' => $projet->getId(),
                'label' => "{$projet->getNom()} (type : {$projet->translateType()})",
            ];
        }
        $this->view->setVar('projetsOptions', $projetsOptions);

        $chefDeProjets = [];
        foreach (ChefDeProjet::find() as $chefDeProjet)
        {
            // populate for select options
            $chefDeProjets [] = [
                'value' => $chefDeProjet->getId(),
                'label' => $chefDeProjet->Collaborateur->getPrenom()." ".$chefDeProjet->Collaborateur->getNom(),
            ];
        }
        $this->view->setVar('chefDeProjets' , $chefDeProjets);

        $developpeurs = [];
        foreach (Developpeur::find() as $developpeur)
        {
            // populate for select options
            $developpeurs [] = [
                'value' => $developpeur->getId(),
                'label' => $developpeur->Collaborateur->getPrenom()." ".$developpeur->Collaborateur->getNom(),
            ];
        }
        $this->view->setVar('developpeurs' , $developpeurs);
    }

}

