<?php

namespace app\Data;

class UserData  {

     public static function create($json) : UserData {
        return new self($json);
     }

}