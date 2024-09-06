<?php

namespace Dawan\FormationPhp\Game;

use Dawan\FormationPhp\Connector\ConnectionHandler;

class TicTacToe 
{
    public array $gamePanel;

    public function __construct()
    {
        $this->gamePanel = [
            ['', '', ''],
            ['', '', ''],
            ['', '', ''],
        ];
    }

    public function playMove(string $player, ConnectionHandler $connector) {
        //récupérer les coordonnés du coup à joueur
        $move = $connector->getCoordinates();

        $x = $move['x'];
        $y = $move['y'];

        //les insérere dans le tableau

        $this->gamePanel[$x][$y] = $player;
    }
}