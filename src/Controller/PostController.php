<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function index()
    {
        return $this->render('post/index.html.twig', [
            'all' => 'vše',
        ]);
    }

    /**
     * @Route("/post/create", name="create_post")
     */
    public function create()
    {
       return $this->render('post/create.html.twig');
    }
}