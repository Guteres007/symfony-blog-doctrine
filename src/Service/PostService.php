<?php
/**
 * Created by PhpStorm.
 * User: Guteres
 * Date: 16.09.2018
 * Time: 20:51
 */
namespace App\Service;
use App\Repository\PostRepository;
use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;


class PostService
{
    private $postRepository;
    private $entityManager;

  public function __construct(PostRepository $postRepository, EntityManagerInterface $entityManager )
  {
      $this->postRepository = $postRepository;
      $this->entityManager = $entityManager;
  }


  public function getAllPosts()
  {
      return $this->postRepository->findAll();
  }

  public function findPostById($id)
  {
      return $this->postRepository->getPost($id);
  }

  public function savePost($data)
  {   $post = new Post();
      $post->setBody($data->getBody());
      $post->setTitle($data->getTitle());
      $this->entityManager->persist($post);
      $this->entityManager->flush();


  }

 // Zde bude třeba query kde se budu dotazovat na dvě repository. Třeba post tag

}