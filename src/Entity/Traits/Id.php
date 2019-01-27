<?php

declare(strict_types=1);

namespace App\Entity\Traits;

/**
 * @author Maxime Cornet <xelysion@icloud.com>
 */
trait Id
{
    /**
     * @var int
     *
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
