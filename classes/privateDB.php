<?php

declare(strict_types=1);

class Drink
{
    private $data = [];


    public function get_name()
    {
        return $this->data['name'];
    }

    /**
     * @param array $data
     */
    public function set_name(string $name)
    {
        $this->data['name'] = $name;
    }


    public function get_amount()
    {
       return $this->data['amount_ml'];
    }

    /**
     * @param array $data
     */
    public function set_amount(int $amount_ml)
    {
        $this->data['amount_ml'] = $amount_ml;
    }

    public function get_abarot()
    {
       return $this->data['abarot'];
    }

    /**
     * @param array $data
     */
    public function set_abarot(float $abarot)
    {
        $this->data['abarot'] = $abarot;
    }


    public function get_image()
    {
       return $this->data['image'];
    }

    /**
     * @param array $data
     */
    public function set_image(string $image)
    {
        $this->data['image'] = $image;
    }
}