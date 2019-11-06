<?php

namespace App\Drinks;

class StrongDrink extends Drink
{
    public function drink()
    {
        $this->setAmount($this->getAmount() - 50);

    }

    public function getImage(): ?string
    {
       return is_null(parent::getImage()) ? 'https://img.pngio.com/shot-glasses-shooter-promotion-wine-glass-glass-png-download-shot-glass-png-900_1000.jpg' : parent::getImage();
    }
}