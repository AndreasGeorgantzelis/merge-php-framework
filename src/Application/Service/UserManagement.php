<?php
declare(strict_types=1);

namespace app\Application\Service;
class UserManagement
{
    public CreateUser $userCreator;
    public function __construct($userCreator) {
        $this->userCreator = $userCreator;
    }

    /**
     * @return void
     */
    public function newUser(): void {
        $userQuantity = $this->userCreator->countUsers();
        echo $userQuantity;
    }
}