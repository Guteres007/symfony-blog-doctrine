<?php
/**
 * Created by PhpStorm.
 * User: Guteres
 * Date: 16.09.2018
 * Time: 20:51
 */
namespace App\Service;
use App\Repository\PostRepository;

class PostService
{
    private $postRepository;
  public function __construct(PostRepository $postRepository)
  {
      $this->postRepository = $postRepository;
  }

  public function getAllPosts()
  {
      return $this->postRepository->getAllPosts();
  }

  public function getPostById($id)
  {
      return $this->postRepository->findPostById($id);
  }

}