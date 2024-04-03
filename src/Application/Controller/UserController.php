<?php
declare(strict_types=1);

namespace app\Application\Controller;

use app\Application\Service\Request;
use app\Application\Service\UserManagement;
use app\Data\UserData;

final class UserController
{
    public function __invoke() : void
    {
        $request = new Request();
        $userManager = new UserManagement();
        echo  json_encode($userManager->create($request));
    }
}