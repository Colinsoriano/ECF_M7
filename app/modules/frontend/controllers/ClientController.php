<?php
declare(strict_types=1);

namespace Test\Modules\Frontend\Controllers;

use Test\Models\Client;

class ClientController extends ControllerBase

{
    public function indexAction()
    {
        $clients = [];
        $clientForTable = [];

        // Fetch all client from the database
        $allClient = Client::find();

      foreach ($allClient as $client)
        {
            // populate for select options
            $clients [] = [
                'value' => $client->getRaisonSociale(),
                'value' => $client->getSs2i(),
            ];

            // populate for table content
            $clientForTable [] = [
                'raison_sociale' => $client->getRaisonSociale(),
                'ss2i' => $client->translateSs2i(),
                'ridet' => $client->getRidet(),
            ];
        }

        // Pass the client and clientForTable data to the view
        $this->view->setVar('client' , $client);
        $this->view->setVar('clientForTable' , $clientForTable);
    }
}
