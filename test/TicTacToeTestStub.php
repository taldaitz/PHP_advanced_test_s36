<?php

use Dawan\FormationPhp\Connector\ConnectionHandler;
use Dawan\FormationPhp\Game\TicTacToe;
use PHPUnit\Framework\TestCase;

class TicTacToeTest extends TestCase
{
    public function testPlayMove()
    {
        $game = new TicTacToe();

        $connector = $this->createConfiguredStub(ConnectionHandler::class, 
            [
                'getCoordinates' => ['x' => 1, 'y' => 1]
            ]
        );

        $game->playMove('X', $connector);

       $this->assertEquals('X', $game->gamePanel[1][1]);
    }
}