<?php

class Drink
{
    private $data = [];


    public function getName()
    {
        return $this->data['name'];
    }

    /**
     * @param array $data
     */
    public function setName(string $name)
    {
        $this->data['name'] = $name;
    }


    public function getAmount()
    {
       return $this->data['amount_ml'];
    }

    /**
     * @param array $data
     */
    public function setAmount(int $amount_ml)
    {
        $this->data['amount_ml'] = $amount_ml;
    }

    public function getAbarot()
    {
       return $this->data['abarot'];
    }

    /**
     * @param array $data
     */
    public function setAbarot(float $abarot)
    {
        $this->data['abarot'] = $abarot;
    }


    public function getImage()
    {
       return $this->data['image'];
    }

    /**
     * @param array $data
     */
    public function setImage(string $url)
    {
        $this->data['image'] = $url;
    }
}