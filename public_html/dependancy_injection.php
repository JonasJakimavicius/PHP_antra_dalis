<?php

class Game
{
    public $scoreGreen;
    public $scoreBlue;

    public function __construct()
    {
        $this->scoreGreen = 0;
        $this->scoreBlue = 0;

    }
}

class Playergreen
{
    public function __construct($game)
    {
        $game->scoreGreen++;
    }
}

class Playerblue
{
    public function __construct($game)
    {
        $game->scoreBlue++;
    }
}

$game = new Game();
$player1 = new Playerblue($game);
$player2 = new Playergreen($game);
$player3 = new Playergreen($game);
var_dump($game);