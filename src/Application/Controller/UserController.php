<?php
declare(strict_types=1);

namespace app\Application\Controller;

use app\Application\Service\UserManagement;

final class UserController
{


    public function __construct(public UserManagement $userManager)
    {
    }

    public function __invoke($userInt) : void
    {
        $this->userManager->newUser();
    }
}