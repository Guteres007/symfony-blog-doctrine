<?php

namespace App\Controller;

use App\Service\PostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    public $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * @Route("/post", name="post")
     */
    public function index()
    {
        $posts = $this->postService->getAllPosts();
        return $this->render('post/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/post/create", name="create_post")
     */
    public function create()
    {
       return $this->render('post/create.html.twig');
    }

    /**
     * @Route("/post/{id}", name="find_post")
     */
    public function show($id)
    {
        $post = $this->postService->findPostById($id);
        return $this->render('post/show.html.twig',['post'=> $post]);
    }
}