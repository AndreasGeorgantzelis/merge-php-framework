<?php

namespace app\Data;

class UserData implements \JsonSerializable {

    public string $newUserData;
    public function __construct($newUserData)
    {
      $this->newUserData = $newUserData;
    }

    public static function create($json) : UserData {
        return new self($json);
     }

     public function jsonSerialize() : array
     {
         return [
             'newUser' => $this->newUserData
         ];
     }

}