<?php

namespace app\Data;

class UserData implements \JsonSerializable {

    public string $username;
    public string $email;
    public int $age;
    public string $city;

    public function __construct(string $username,string $email,int $age,string $city)
    {
        $this->username = $username;
        $this->email = $email;
        $this->age = $age;
        $this->city = $city;
    }

    public static function create(string $username,string $email,int $age,string $city) : UserData {
        return new self($username,$email,$age,$city);
     }

     public function jsonSerialize() : array
     {
         return [
             'newUser' => $this->username
         ];
     }

}