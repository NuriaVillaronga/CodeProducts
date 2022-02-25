<?php

namespace App\UserServices;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CheckCredentials extends AbstractController
{
    public function userCheckCredentials(User $user){

        $sessionUser = $this->getUser();

        if (!$sessionUser->isAdmin() && !$user->equals($sessionUser)) {
            throw new AccessDeniedHttpException();
        }
    }
}