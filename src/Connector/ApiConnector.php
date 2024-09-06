<?php

namespace Dawan\FormationPhp\Connector;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiConnector implements ConnectionHandler
{
    private HttpClientInterface $client;

    public function __construct()
    {
        $this->client = HttpClient::create();
    }

    public function getCoordinates() : array
    {
        $response = $this->client->request('GET', 'https://ca0d-193-248-167-31.ngrok-free.app/move.php');
        $coordinates = $response->getContent();
        $move = explode(':', $coordinates);

        return ['x' => $move[0], 'y' => $move[1]];
    }
}