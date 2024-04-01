<?php
declare(strict_types=1);

namespace app\Application\Controller;

use app\Application\Service\UserManagement;

final class UserController
{
    public function __invoke() : void
    {
        $userManager = new UserManagement();
        $userManager->create();
    }
}