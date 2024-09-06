<?php

use Dawan\FormationPhp\Connector\ApiConnector;
use Dawan\FormationPhp\Game\TicTacToe;
use PHPUnit\Framework\TestCase;

class TicTacToeTest extends TestCase
{
    public function testPlayMove()
    {
        $game = new TicTacToe();

        $game->playMove('X', new StubConnector());

       $this->assertEquals('X', $game->gamePanel[1][1]);
    }
}

class StubConnector extends ApiConnector
{
    public function getCoordinates(): array
    {
        return ['x' => 1, 'y' => 1];
    }
}