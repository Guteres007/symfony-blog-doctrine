<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    public $postRepository;
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * @Route("/post", name="post")
     */
    public function index()
    {
        $posts = $this->postRepository->getAllPosts();
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
        $post = $this->postRepository->findPostById($id);
        return $this->render('post/show.html.twig',['post'=> $post]);
    }
}