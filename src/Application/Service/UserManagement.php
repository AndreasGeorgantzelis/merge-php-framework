<?php
declare(strict_types=1);

namespace app\Application\Service;
use app\Data\UserData;

class UserManagement
{

    /**
     * @return void
     */
    public function create($request): UserData {
        $userCreator = new CreateUser();
        $userCount= $userCreator->countUsers();
        return $userCreator->createUser($userCount+1,$request);
    }
}

