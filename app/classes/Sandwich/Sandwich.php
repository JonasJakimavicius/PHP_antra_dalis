<?php

namespace App\Sandwich;

class Sandwich
{
    private $data = [];


    public function getName()
    {
        return $this->data['name'];
    }

    public function setName(string $name)
    {
        $this->data['name'] = $name;
    }


    public function getPrice()
    {
        return $this->data['price'];
    }

    public function setPrice(float $price)
    {
        $this->data['price'] = $price;
    }

    public function getSpiciness()
    {
        return $this->data['spiciness'];
    }


    public function setSpiciness(bool $spiciness)
    {
        $this->data['spiciness'] = $spiciness;
    }


    public function getImage()
    {
        return $this->data['image'];
    }


    public function setImage(string $image)
    {
        $this->data['image'] = $image;
    }

    public function getVegan()
    {
        return $this->data['vegan'];
    }


    public function setVegan(bool $vegan)
    {
        $this->data['vegan'] = $vegan;
    }

    /**
     * Funkcija, kuri paleidzia get'erius ir pargrazina pakoreguota masyva pagal get'eriuose nurodyta logika.
     * @return array
     */
    public function getData()
    {
        $data = [
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'spiciness' => $this->getSpiciness(),
            'image' => $this->getImage(),
            'vegan'=>$this->getVegan(),
        ];
        return $data;
    }

    /**
     *Funkcija, kuri paleidzia seter'i, jei paduodamame masyve yra reiksme su tokiu indeksu.
     * @param array $data
     */
    public function setData(array $data)
    {
        if (isset($data['price'])) {
            $this->setPrice($data['price']);
        }else{
            $this->data['price']=null;
        }
        if (isset($data['spiciness'])) {
            $this->setSpiciness($data['spiciness']);
        }else{
            $this->data['spiciness']=null;
        }
        if (isset($data['image'])) {
            $this->setImage($data['image']);
        }else{
            $this->data['image']=null;
        }
        if (isset($data['name'])) {
            $this->setName($data['name']);
        }else{
            $this->data['name']=null;
        }
        if (isset($data['vegan'])) {
            $this->setVegan($data['vegan']);
        }else{
            $this->data['vegan']=null;
        }
    }

    /**
     * Funkcija, kuri sugeneruoja indeksus su tusciomis reiksmemis, jei nepaduodame array arba ji paduodame tuscia.
     * Jei paduodame gera array, tai iskviecia setData funkcija
     * */
    public function __construct(array $data = null)
    {
        if ($data === null) {
            $this->data = [
                'name' => null,
                'price' => null,
                'spiciness' => null,
                'vegan' => null,
                'image'=>null
            ];
        } else {
            $this->setData($data);

        }
    }
}