<?php
declare(strict_types=1);

namespace app\Application\Service;
class UserManagement
{

    /**
     * @return void
     */
    public function create(): void {
        $userCreator = new CreateUser();
        $userCount= $userCreator->countUsers();
        $userCreator->createUser($userCount+1);
    }
}

