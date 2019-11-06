<?php

namespace App\Drinks;

class LightDrink extends Drink
{
    public function drink()
    {
        $this->setAmount($this->getAmount() - 100);

    }

    public function getImage(): ?string
    {
        return is_null(parent::getImage()) ? 'https://storage.needpix.com/rsynced_images/glass-2346358_1280.png' : parent::getImage();
    }
}