<?php
declare(strict_types=1);

namespace app\Application\Service;

use app\Data\UserData;

class CreateUser
{
    /**
     * @return void
     */
    public function createUser(int $userCount) : UserData
    {
        $directory = getcwd() . "/users/";
        $userFilePath = $directory . 'user' . $userCount . '.json';
        $userFile = fopen($userFilePath, "w") or die("Unable to open file!");
        $json = '[
    {
      "username": "jane_smith",
      "email": "jane@example.com",
      "age": 25,
      "city": "Los Angeles"
    }
]';
        fwrite($userFile, $json);
        fclose($userFile);
        return UserData::create($json);
    }

    /**
     * @return int
     */
    public function countUsers(): int
    {
        $directory = getcwd() . "/users/";
        $filecount = 0;
        $files2 = glob($directory . "*");

        if ($files2) {
            $filecount = count($files2);
        }

        return $filecount;
    }
}