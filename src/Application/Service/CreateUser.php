<?php
declare(strict_types=1);

namespace app\Application\Service;

use app\Data\UserData;

class CreateUser
{
    /**
     * @param int $userCount
     * @return UserData
     */
    public function createUser(int $userCount,Request $request) : UserData
    {
        $directory = getcwd() . "/users/";
        $userFilePath = $directory . 'user' . $userCount . '.json';
        $userFile = fopen($userFilePath, "w") or die("Unable to open file!");
        $json = $request->getBody();
        fwrite($userFile, $json);
        fclose($userFile);
        //json decode will be removed after i use payload json
        return UserData::create($json);
    }

    /**
     * @return int
     */
    public function countUsers(): int
    {
        $directory = getcwd() . "/users/";
        $fileCount = 0;
        $files2 = glob($directory . "*");

        if ($files2) {
            $fileCount = count($files2);
        }

        return $fileCount;
    }
}