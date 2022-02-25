<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    private function getUsers():array
    {
        return [
            0 => [
                'name'  => 'Nuria Villaronga',
                'email' => 'nuria.villaronga@gmail.com',
                'role' => ['ROLE_ADMIN','ROLE_USER'],
                'password' => 'nuria',
                'active' => true,
                'deleted' => false
            ],
            1 => [
                'name'  => 'Milena Villaronga',
                'email' => 'milena.villaronga@gmail.com',
                'role' => ['ROLE_USER'],
                'password' => 'milena',
                'active'    => true,
                'deleted' => true
            ],
            2 => [
                'name'  => 'Juana Villaronga',
                'email' => 'juana.villaronga@gmail.com',
                'role' => ['ROLE_USER'],
                'password' => 'juana',
                'active'    => true,
                'deleted' => false
            ],
            3 => [
                'name'  => 'Dalila Villaronga',
                'email' => 'dalila.villaronga@gmail.com',
                'role' => ['ROLE_USER'],
                'password' => 'dalila',
                'active'    => true,
                'deleted' => false
            ],
            4 => [
                'name'  => 'Moraima Villaronga',
                'email' => 'moraima.villaronga@gmail.com',
                'role' => ['ROLE_USER'],
                'password' => 'moraima',
                'active'    => true,
                'deleted' => true
            ],
            5 => [
                'name'  => 'Xura Villaronga',
                'email' => 'xura.villaronga@gmail.com',
                'role' => ['ROLE_USER'],
                'password' => 'xura',
                'active'    => false,
                'deleted' => false
            ],
            6 => [
                'name'  => 'Xose Villaronga',
                'email' => 'xose.villaronga@gmail.com',
                'role' => ['ROLE_USER'],
                'password' => 'xose',
                'active'    => false,
                'deleted' => true
            ],
        ];
    }
    
    public function load(ObjectManager $manager)
    {
        $usersData = $this->getUsers();

        foreach ($usersData as $user) {
            $newUser = new User();
            $newUser->setName($user['name']);
            $newUser->setEmail($user['email']);
            $newUser->setRoles($user['role']);
            $newUser->setPassword($this->passwordHasher->hashPassword($newUser, $user['password']));
            $newUser->setIsActive($user['active']);
            $newUser->setIsDeleted($user['deleted']);
            $manager->persist($newUser);
        }

        $manager->flush();
    }
}