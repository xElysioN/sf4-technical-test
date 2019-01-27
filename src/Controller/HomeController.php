<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Maxime Cornet <xelysion@icloud.com>
 */
class HomeController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('home/index.html.twig');
    }
}
