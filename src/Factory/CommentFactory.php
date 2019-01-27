<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Comment;
use App\Entity\User;

/**
 * @author Maxime Cornet <xelysion@icloud.com>
 */
class CommentFactory
{
    public function create(string $content, User $user, string $repositoryName): Comment
    {
        $comment = new Comment();
        $comment->setUser($user);
        $comment->setContent($content);
        $comment->setRepositoryName($repositoryName);

        return $comment;
    }
}
