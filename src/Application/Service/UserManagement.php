<?php
declare(strict_types=1);

namespace app\Application\Service;
class UserManagement
{

    /**
     * @return void
     */
    public function __invoke(): void {
        $userCreator = new CreateUser();
        $userQuantity = $userCreator->countUsers();
        echo $userQuantity;
    }
}