<?php

namespace App\Drinks;

class Drink
{
    private $data = [];


    public function getName (): ?string
    {
        return $this->data['name'];
    }

    public function setName(string $name)
    {
        $this->data['name'] = $name;
    }


    public function getAmount(): ?int
    {
        return $this->data['amount_ml'];
    }

    public function setAmount(int $amount_ml)
    {
        $this->data['amount_ml'] = $amount_ml;
    }

    public function getAbarot():?float
    {
        return $this->data['abarot'];
    }


    public function setAbarot(float $abarot)
    {
        $this->data['abarot'] = $abarot;
    }


    public function getImage():?string
    {
        return $this->data['url'];
    }


    public function setImage(string $url)
    {
        $this->data['url'] = $url;
    }

    public function getId():?int
    {
        return $this->data['id'];
    }


    public function setId(int $id)
    {
       $this->data['id'] = $id;
    }

    /**
     * Funkcija, kuri paleidzia get'erius ir pargrazina pakoreguota masyva pagal get'eriuose nurodyta logika.
     * @return array
     */
    public function getData():array
    {
        $data = [
            'name' => $this->getName(),
            'abarot' => $this->getAbarot(),
            'amount' => $this->getAmount(),
            'url' => $this->getImage(),
            'id'=>$this->getId(),

        ];
        return $data;
    }

    /**
     *Funkcija, kuri paleidzia seter'i, jei paduodamame masyve yra reiksme su tokiu indeksu.
     * Jei tokios reiksmes nepaduodam - tam indeksui nustato reiksme null.
     * @param array $data
     */
    public function setData(array $data)
    {
        if (isset($data['abarot'])) {
            $this->setAbarot($data['abarot']);
        }else{
            $this->data['abarot']=null;
        }
        if (isset($data['amount'])) {
            $this->setAmount($data['amount']);
        }else{
            $this->data['amount']=null;
        }
        if (isset($data['url'])) {
            $this->setImage($data['url']);
        }else{
            $this->data['url']=null;
        }
        if (isset($data['name'])) {
            $this->setName($data['name']);
        }else{
            $this->data['name']=null;
        }
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }else{
            $this->data['id']=null;
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
                'abarot' => null,
                'url' => null,
                'amount' => null,
                'id'=>null
            ];
        } else {
            $this->setData($data);

        }
    }
}