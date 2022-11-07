<?php

namespace App\Service;

use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use App\Entity\Ro\User;

use Exception;

class UserService extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry, UserPasswordHasherInterface $passwordHasher) {
        $this->registry = $registry;
        $this->passwordHasher = $passwordHasher;
    }

/**
     * Save user and send email
     *
     * @param array $userArr
     * @return bool
     */
    public function saveUser(array $userArr)
    {
        try {
            $user = new User();
            $user->setEmail($userArr['email']);
            $user->setPassword($this->passwordHasher->hashPassword($user, $userArr['password']));
            $user->setRoles(
                $this->getDefaultRoles()
            );
            $user->setFirstName($userArr['firstName']);
            $user->setLastName($userArr['lastName']);
            $user->setPhoneNumber($userArr['phoneNumber']);

            $this->registry->getManager('ro')->persist($user);
            $this->registry->getManager('ro')->flush();

            return true;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function getDefaultRoles(): array
    {
        return ['ROLE_USER'];
    }
}