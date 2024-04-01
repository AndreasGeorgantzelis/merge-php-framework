<?php

namespace app\Data;

class UserData {
    private int $id;
    private string $username;
    private string $email;

    private int $age;

    private string $city;

    public function __construct($id, $username, $email, $age, $city) {
        $this->id = $id;
        $this->username = $username;
        $this->email = $email;
        $this->age = $age;
        $this->city = $city;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAge() {
        return $this->age;
    }

    public function getCity() {
        return $this->city;
    }

}