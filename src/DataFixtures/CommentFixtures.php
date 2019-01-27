<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use App\Factory\CommentFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * @author Maxime Cornet <xelysion@icloud.com>
 */
class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    private $commentFactory;

    public function __construct(CommentFactory $commentFactory)
    {
        $this->commentFactory = $commentFactory;
    }

    public function load(ObjectManager $manager): void
    {
        /** @var User $user */
        $user = $this->getReference('user_john');
        $comment = $this->commentFactory->create('Mon premier commentaire', $user, 'xElysioN/sf4-technical-test');

        $manager->persist($comment);
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [UserFixtures::class];
    }
}
