<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @author Maxime Cornet <xelysion@icloud.com>
 */
final class UserFactory
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function create($email, $password, $roles = ['ROLE_USER']): User
    {
        $user = new User();

        $user->setEmail($email);
        $user->setRoles($roles);
        $password = $this->encoder->encodePassword($user, $password);
        $user->setPassword($password);

        return $user;
    }
}
