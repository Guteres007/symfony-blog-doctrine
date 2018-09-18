<?php

namespace App\Controller;

use App\Form\PostType;
use App\Entity\Post;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use App\Service\PostService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    public $postService;
    public $postType;
    public function __construct(PostService $postService, PostType $postType )
    {
        $this->postService = $postService;
        $this->postType = $postType;
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
     * @Route("/post/new", name="new_post")
     */
    public function new(Request $request)
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            //TODO : uložit
            $this->postService->savePost($form->getData());
            return $this->redirectToRoute("new_post");
        }

        return $this->render('post/new.html.twig', ["form" => $form->createView()]);
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