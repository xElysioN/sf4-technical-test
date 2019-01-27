<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Factory\UserFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    /** @var UserFactory */
    private $userFactory;

    public function __construct(UserFactory $userFactory)
    {
        $this->userFactory = $userFactory;
    }

    public function load(ObjectManager $manager): void
    {
        /** @var User $user */
        $user = $this->userFactory->create('john@doe.fr', 'john');

        $manager->persist($user);
        $manager->flush();

        $this->addReference('user_john', $user);
    }
}
