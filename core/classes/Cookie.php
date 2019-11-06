<?php

namespace Core;

class Cookie extends \Core\Abstracts\Cookie
{

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function exists(): bool
    {
        return isset($_COOKIE[$this->name]) ? true : false;
    }


    /**
     * Turi return'inti json_decode'intą cookie'o
     * turinį.
     *
     * Patikrinti ar pavyko json_decode'inti
     * (Use Google)
     * Jei nepavyko, funkcija turi mesti warning'ą
     * (ne EXCEPTION'ą, bet WARNING'ą - Use Google).
     * ir return'inti tuščią array
     *
     * Jei cookie'is nustatytu pavadinimu neegzistuoja,
     * turi return'inti tuščią array'ų
     */
    public function read(): array
    {
        if ($this->exists()) {
            $array = json_decode($_COOKIE[$this->name],true);
            if (is_array($array)) {
                return $array;
            }
            trigger_error('Nepavyko json_decodeint', E_USER_WARNING);
        }
        return $array = [];
    }

    /**
     * Turi į Cookie duotu pavadinimu
     * išsaugoti json_encode'intą $data array'jų
     * (Google setcookie)
     *
     * Į cookie galima įrašyt tik string'ą.
     * Kadangi mes norim galimybę turėti į tą patį
     * Cookie storinti daugiau data'os, galim tiesiog
     * encode'inti ir decode'inti array'jų su json'u.
     *
     * Mes į cookie įrašysim už'json_encodinę $data
     * ir atkursim atgal json_decode'inę tai ką radom Cookie
     *
     * @param $data array
     * @param $expires_in int Už kiek laiko sekundemis cookie nebegalios
     */

    public function addData(array $data, int $expires_in = 3600): void
    {
        if ($this->exists()) {
        $array = $this->read();
        foreach ($data as $key => $value) {
            $array[$key] = $value;
        }
        $json_string = json_encode($array);
    } else {
        $json_string = json_encode($data);
    }
        setcookie($this->name, $json_string, time()+$expires_in);
    }

    public function save(array $data, int $expires_in = 3600): void
    {
        setcookie($this->name, json_encode($data), time()+$expires_in);
    }

    public function delete(): void
    {
        setcookie($this->name,null, -3600,'/');
        unset($_COOKIE[$this->name]);
    }
}