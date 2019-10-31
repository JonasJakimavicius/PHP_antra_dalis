<?php

namespace App\Users;

class User
{
    private $data = [];

    /**
     * Get'eris, kuris grazina name is Data property
     * @return string
     */
    public function getName(): ?string
    {
        return $this->data['name'];
    }

    /**
     * Set'eris, kuris Data property nustato paduoda value indeksu 'name'
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->data['name'] = $name;
    }

    /**
     * Get'eris, kuris grazina email is Data property
     * @return string email
     */
    public function getEmail(): ?string
    {
        return $this->data['email'];
    }

    /**
     * Set'eris, kuris Data property nustato paduoda value indeksu 'email'
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->data['email'] = $email;
    }

    /**
     * Get'eris, kuris grazina password is Data property
     * @return string password
     */
    public function getPassword(): ?string
    {
        return $this->data['password'];
    }

    /**
     * Set'eris, kuris Data property nustato paduoda value indeksu 'password'
     * @param string $password
     */
    public function setPassword(string $password)
    {
        $this->data['password'] = $password;
    }
    /**
     * Get'eris, kuris grazina ID is Data property
     * @return int
     */
    public function getId():?int
    {
        return $this->data['id'];
    }

    /**
     * Set'eris, kuris Data property nustato paduoda value indeksu 'id'
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->data['id'] = $id;
    }

    /**
     *Funkcija, kuri paleidzia seter'i, jei paduodamame masyve yra reiksme su tokiu indeksu.
     * Jei tokios reiksmes nepaduodam - tam indeksui nustato reiksme null.
     * @param array $data
     */
    public function setData(array $data)
    {
        if (isset($data['name'])) {
            $this->setName($data['name']);
        } else {
            $this->data['name'] = null;
        }
        if (isset($data['email'])) {
            $this->setEmail($data['email']);
        } else {
            $this->data['email'] = null;
        }
        if (isset($data['password'])) {
            $this->setPassword($data['password']);
        } else {
            $this->data['password'] = null;
        }
        if (isset($data['id'])) {
            $this->setId($data['id']);
        }else{
            $this->data['id']=null;
        }
    }

    /**
     * Funkcija, kuri paleidzia get'erius ir pargrazina pakoreguota masyva pagal get'eriuose nurodyta logika.
     * @return array
     */
    public function getData(): array
    {
        $data = [
            'name' => $this->getName(),
            'email' => $this->getEmail(),
            'password' => $this->getPassword(),
            'id'=>$this->getId(),

        ];
        return $data;
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
                'email' => null,
                'password' => null
            ];
        } else {
            $this->setData($data);

        }
    }

}